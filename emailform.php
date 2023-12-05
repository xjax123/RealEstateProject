<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Realtor</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #e0e0e0;
            margin: 0;
        }

        .content-box {
            border: 3px solid black;
            border-radius: 8px;
            padding: 20px;
            background-color: white;
            margin: 20px auto;
            max-width: 1200px;
            text-align: center;
        }

        .image {
            float: right;
            width: 150px;
            height: 150px;
            border-radius: 8px;
            margin-left: 20px;
        }

        .mbox {
            width: 100%;
            height: 300px;
            margin-top: 20px;
        }

        input[type=submit] {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
        }

        input[type=submit]:hover {
            background-color: #333;
        }

        h3, p, label {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body>
    <?php
    $email = $_POST['email'];
    $name = $_POST['name'];
    $image = $_POST['image'];

    $subtitle = "Contact " . $name;
    require_once './view/header.php';

    if ($_SESSION['user'] == "Unknown") {
        echo "<div class='content-box'>You must be logged in to do that!</div>";
    } else {
        echo "<div class='content-box'>";
        echo '<h3>Contact ' . $name . '</h3>';
        echo '<img class="image" src="' . str_replace(realpath($_SERVER["DOCUMENT_ROOT"]), "", getcwd()) . '\\images\\' . $image . '" alt="Realtor PFP">';
        echo '<form method="POST" action="email.php" id="emailresponse">';
        echo '<input type="hidden" id="rname" name="rname" value="' . $name . '">';
        echo '<input type="hidden" id="remail" name="remail" value="' . $email . '">';
        echo '<label for="cname">Client Name: ' . $_SESSION['Name'] . '</label>';
        echo '<input type="hidden" id="cname" name="cname" value="' . $_SESSION['Name'] . '"><br>';
        echo '<label for="cemail">Client Email: ' . $_SESSION['Email'] . '</label>';
        echo '<input type="hidden" id="cemail" name="cemail" value="' . $_SESSION['Email'] . '"><br>';
        echo '<textarea class="mbox" name="message" id="message" form="emailresponse" placeholder="Enter text here..."></textarea> <br>';
        echo '<input type="submit" id="submit" value="Contact Me">';
        echo '</form>';
        echo "</div>";
    }
    require './view/footer.php';
    ?>
</body>

</html>
