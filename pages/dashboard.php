<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/web_logo.svg"/>
    <link rel="stylesheet" type="text/css" href="style/style.css"/>
    <title>Puppuccino Palace</title>
</head>
<body>
        
    <!------ Header starts ------>
    <div class="headers">
        <div class="frontpage">
            <div class="img_top">
                <img src="img/dashboard_dog.png" alt="Dog">
            </div>

            <h1>Puppuccino Palace </br> Dog Competitions.</h1>
            <h4>Tailored to showcase <span class="highlight">top level dogs</span></h4>

            <a href="https://www.dogshowcentral.co.uk/showlist.php" class="button1">Location</a>
            <a href="https://www.dogster.com/lifestyle/types-of-dog-competitions" class="button2">
                <img src="img/button_logo.svg" alt="Logo" class="button-logo">Learn More</a>
        </div>

        <div class="format">
            <img src="img/intro_dog.png" alt="dog" class="intro_dog">
            <h2>Welcome Friends</h2>
            <p>Welcome to Poppleton Dog Show! This year, we’re thrilled to welcome 50 dedicated owners who have entered 300 amazing dogs across 15 exciting competitions.
            The energy and enthusiasm are contagious as we showcase the incredible talent, skill, and dedication of both the dogs and their owners.
            We couldn’t be more excited to see these remarkable competitors strut their stuff, and we’re sure you’ll be just as impressed as we are. 
            Get ready for an unforgettable event filled with passion, precision, and plenty of tail-wagging fun!</p>
        </div>


        <div class="card-container">
            <?php
            // Define custom card titles and content
            $cardDetails = [
                "dogs" => ["title" => "Dogs", "description" => "Discover the breeds and participants in our dog competitions."],
                "owners" => ["title" => "Owners", "description" => "Meet the dedicated dog owners who bring their best friends to compete."],
                "winners" => ["title" => "Annual Winners", "description" => "Celebrate the top winners of our annual dog competitions."],
                "judges" => ["title" => "Judges", "description" => "Learn more about the expert judges who evaluate and ensure fair competitions"],
                "competitions" => ["title" => "Competitions", "description" => "Find out about upcoming dog competitions and how to participate."],
                "register" => ["title" => "Register", "description" => "Sign up your dog today for upcoming events, competitions, and community activities."],
            ];

            // Loop through the card details to generate cards
            foreach ($cardDetails as $page => $details) {
                $title = $details["title"];
                $description = $details["description"];
                echo "
                <a href=\"index.php?page=$page\" class=\"card\">
                    <h3>$title</h3>
                    <p>$description</p>
                    <button>Learn More</button>
                </a>";
            }
            ?>
        </div>

    </div>
    <!------ Header ends ------>
