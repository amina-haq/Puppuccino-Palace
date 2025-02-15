<?php
include './connection.php';

$owner_id = isset($_GET['owner_id']) ? $_GET['owner_id'] : null;

// Query to get info the list of top 10 dogs
$query = "SELECT d.name AS dog_name, b.name AS breed_name, AVG(e.score) AS avg_score, 
          o.name AS owner_name, o.email AS owner_email, o.id AS owner_id
          FROM dogs d
          INNER JOIN breeds b ON d.breed_id = b.id
          INNER JOIN entries e ON d.id = e.dog_id
          INNER JOIN owners o ON d.owner_id = o.id
          GROUP BY d.id, b.name, o.id
          HAVING COUNT(e.score) > 1
          ORDER BY avg_score DESC LIMIT 10";

$result = mysqli_query($conn, $query);

// SQL queries to get the required counts
$owners = "SELECT COUNT(DISTINCT name) AS total_owners FROM owners";
$dogs = "SELECT COUNT(*) AS total_dogs FROM dogs";
$competitions = "SELECT COUNT(*) AS total_events FROM competitions";

// Fetching the results
$ownersResult = $conn->query($owners)->fetch_assoc()['total_owners'];
$dogsResult = $conn->query($dogs)->fetch_assoc()['total_dogs'];
$competitionsResult = $conn->query($competitions)->fetch_assoc()['total_events'];

// Close connection
$conn->close(); 
?>

<!-- dashboard section starts  -->
<div class="dashboard">        
    <h1>Poppleton Dog Show</h1>
    <h2>Welcome to Poppleton Dog Show! This year <?= $ownersResult ?> owners entered <?= $dogsResult ?> dogs in <?= $competitionsResult ?> competitions!</h2>
    <h3>Top 10 Ranked Doges</h3>
    
    <table class="rank_table">
        <tr class="columns">
            <th>#</th>
            <th>Dogs name</th>
            <th>Breed</th>
            <th>Average score</th>
            <th>Owner name</th>
            <th>Email</th>
        </tr>
        <?php
        $number = 1;
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo htmlspecialchars($row['dog_name']); ?></td>
            <td><?php echo htmlspecialchars($row['breed_name']); ?></td>
            <td><?php echo number_format($row['avg_score'], 2); ?></td>
            <td><a href="owner_details.php?owner_id=<?php echo $row['owner_id']; ?>"><?php echo htmlspecialchars($row['owner_name']); ?></a></td>
            <td><a href="mailto:<?php echo htmlspecialchars($row['owner_email']); ?>"><?php echo htmlspecialchars($row['owner_email']); ?></a></td>
        </tr>
        <?php
        $number++; }
        } else {
            echo "<tr><td colspan='6'>No data found.</td></tr>";
        }
        
        ?>
    </table>
</div>
<!-- dashboard section ends  -->
