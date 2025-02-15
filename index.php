<?php
session_start();

// Redirect to login if the user is not logged in
if (empty($_SESSION["username"])) {
    header("location: login.php");
    die();
}

// Set the default page to 'dashboard'
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// Treat 'home' as an alias for 'dashboard'
if ($page === 'home') {
    $page = 'dashboard';
}

// Include the header
include './header.php';

// Include the requested page or show a 404 error
$pageFile = "./pages/$page.php";
if (file_exists($pageFile)) {
    include $pageFile;
} else {
    echo "<div class='content'><h2>404 - Page Not Found</h2><p>The page you are looking for does not exist.</p></div>";
}

// Include the footer
include './footer.php';
?>
