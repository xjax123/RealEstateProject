<?php
$subtitle = "Contact";
require './view/header.php';
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
<style>
    body {
        font-family: 'Montserrat', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #e0e0e0;
    }

    .contact-container {
        max-width: auto;
        margin: 30px;
        padding: 20px;
        background-color: #f8f8f8;
        border-radius: 8px;
        border: 3px solid black;
    }

    .contact-info {
        margin-bottom: 20px;
    }

    .contact-info h3 {
        color: #333;
        margin-bottom: 10px;
    }

    .contact-info p {
        margin: 0;
        color: #777;
    }
</style>
<img src="images/logo.png" alt="Logo" style="width: 250px; margin-bottom: 20px; margin-top: 20px; display: block; margin-left: auto; margin-right: auto;">
<div class="contact-container">

    <h2>Contact Us!</h2>

    <div class="contact-info">
        <h3>Email</h3>
        <p>info@realestate.ca</p>
    </div>

    <div class="contact-info">
        <h3>Phone Number</h3>
        <p>(604) 123-4567</p>
    </div>

    <div class="contact-info">
        <h3>Address</h3>
        <p>
            123 Main Street,<br>
            Surrey, BC, 12345,<br>
            Canada
        </p>
    </div>
</div>

<?php
require './view/footer.php';
?>