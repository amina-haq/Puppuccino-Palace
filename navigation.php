<?php
// Ensure $page has a default value
if (!isset($page)) {
    $page = 'homepage';
}

$menu = [
    "home" => "Home",
    "dogs" => "Dogs",
    "owners" => "Owners",
    "judges" => "Judges",
    "competitions" => "Competitions",
];
?>

<div id="navbar">
    <ul>
        <li class="logo">
            <a href="index.php?page=dashboard" class="logo">
                <img src="img/logo_dog.png" alt="Puppuccino Palace Logo" class="logo_image">Puppuccino Palace</a>
        </li>

        <?php
        foreach ($menu as $p => $label) {
            $activeClass = ($page == $p) ? " class=\"active\"" : "";
            echo "<li class=\"menu\"><a href=\"index.php?page=$p\"$activeClass>$label</a></li>";
        }
        ?>
        <li class="btn_logout"><a href="logout.php">Logout</a></li>
    </ul>
</div>