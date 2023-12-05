<?php
$subtitle = "My Account";
require './view/header.php';
?>

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h3 {
            color: #333;
        }

        .account-section {
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .submit {
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .result {
            margin-top: 10px;
            color: #777;
        }

        .preference {
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .outputTable {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            margin-bottom: 20px;
        }

        .outputTable td,
        .outputTable th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .outputTable th {
            background-color: #f2f2f2;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>

<?php
require_once './backend/dbConnect.php';
$imageoutput = "";
if (isset($_POST['imagesubmit'])) {    
    $defaultImage = "default.png";
    $image = $_FILES['accountImage']['name'];
    if ($image == "default" || !isset($image)) {
        $image = $defaultImage;
    }

    $uploadfile =  __DIR__.'\\images\\'.basename($_FILES['accountImage']['name']);
    if (move_uploaded_file($_FILES['accountImage']['tmp_name'], $uploadfile)) {
    } else {
        throw new Error("Possible file upload attack!");
    }
    try {
        $conn = connect();
        $user = $_SESSION['user'];
        $result = $conn -> query('SELECT AccountID FROM `accounts` WHERE Username = "'.$user.'";');
        $conn -> close();
        $conn = connect();
        $result = $conn -> insert('UPDATE `accounts` SET Image = "'.$image.'" WHERE Username = "'.$user.'";');
        $conn ->close();
        if ($result) {
            $imageoutput = "Image Updated";
        } else {
            $imageoutput = "Unknown Error";
        }
    } catch (Error $e) {
        $imageoutput = $e->getMessage();
    }
}
?>

<div class="account-section">
    <h3>Adjust Account Details</h3>
    Username: <input type="text" id="username"><br>
    <button onclick='updateValue("username","usernameresult", "account", "Username")'>Adjust Username</button><br>
    <div id="usernameresult"></div><br>

    Password: <input type="text" id="password"><br>
    <button onclick='updateValue("password","passwordresult", "account", "Password")'>Adjust Password</button><br>
    <div id="passwordresult"></div><br>

    Email: <input type="text" id="email"><br>
    <button onclick='updateValue("email","emailresult", "account", "Email")'>Adjust Email</button><br>
    <div id="emailresult"></div><br>
    
    Image: <form method="POST" action="#" enctype="multipart/form-data"><input type="file" id="accountImage" name="accountImage" class="form-input" required><br>
    <input class="submit" type="submit" name="imagesubmit" value="Adjust Image"><br>
    <div id="imageresult"><?php echo $imageoutput; ?></div><br>

    Phone Number: <input type="text" id="phone"><br>
    <button onclick='updateValue("phone","phoneresult", "account", "PhoneNumber")'>Adjust Phone Number</button><br>
    <div id="phoneresult"></div><br>

    Name: <input type="text" id="name"><br>
    <button onclick='updateValue("name","nameresult", "account", "Name")'>Adjust Name</button><br>
    <div id="nameresult"></div><br>
</div>

<div class="preference">
    <h3>Adjust Preference Details</h3>
    Current Details:
    <?php
    require_once './backend/dbConnect.php';
    $UID = $_SESSION['UID'];
    $conn = connect();
    $query = $conn->query('SELECT * FROM `preference` WHERE AccountID = ' . $UID . ';');
    $row = $query->fetch_assoc();
    ?>
    <table class="outputTable">
        <thead>
            <tr>
                <th>Type</th>
                <th>City</th>
                <th>Province</th>
                <th>Minimum Size</th>
                <th>Maximum Size</th>
                <th>Minimum Price</th>
                <th>Maximum Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $row['Type'] ?></td>
                <td><?= $row['City'] ?></td>
                <td><?= $row['Province'] ?></td>
                <td><?= $row['SizeMin'] ?></td>
                <td><?= $row['SizeMax'] ?></td>
                <td><?= $row['PriceMin'] ?></td>
                <td><?= $row['PriceMax'] ?></td>
            </tr>
        </tbody>
    </table>

    <label for="type">Preferred Type:</label>
    <select id="type" name="type">
        <option value="Condo">Condo</option>
        <option value="Commercial">Commercial</option>
        <option value="Townhouse">Townhouse</option>
        <option value="House">House</option>
        <option value="Apartment">Apartment</option>
    </select><br>
    <button onclick='updateValue("type","typeresult", "preference", "Type")'>Adjust Property Type</button>
    <div id="typeresult" class="result"></div>

    <label for="city">City:</label>
    <input type="text" id="city"><br>
    <button onclick='updateValue("city","cityresult", "preference", "City")'>Adjust City</button>
    <div id="cityresult" class="result"></div>

    <label for="province">Province:</label>
    <input type="text" id="province"><br>
    <button onclick='updateValue("province","provinceresult", "preference", "Province")'>Adjust Province</button>
    <div id="provinceresult" class="result"></div>

    <label for="sizemin">Size (sqft):</label>
    min <input type="text" id="sizemin">
    max <input type="text" id="sizemax"><br>
    <button onclick='updateValue("sizemin","sizeresult", "preference", "sizemin")'>Adjust Min Size</button>
    <button onclick='updateValue("sizemax","sizeresult", "preference", "sizemax")'>Adjust Max Size</button>
    <div id="sizeresult" class="result"></div>

    <label for="pricemin">Price ($):</label>
    min <input type="text" id="pricemin"> -
    max <input type="text" id="pricemax"><br>
    <button onclick='updateValue("pricemin","priceresult", "preference", "pricemin")'>Adjust Min price</button>
    <button onclick='updateValue("pricemax","priceresult", "preference", "pricemax")'>Adjust Max price</button>
    <div id="priceresult" class="result"></div>
</div>

<style>
    .preference {
        content-visibility: <?php
                            if ($_SESSION['AccountType'] == "Customer") {
                                echo " visible";
                            } else {
                                echo "hidden";
                            }
                            ?>;
    }
</style>

<script>
    function updateValue(fieldid, responseid, category, type) {
        var xml = new XMLHttpRequest();
        var value = document.getElementById(fieldid).value;
        field = document.getElementById(responseid);
        if (value.length == 0) {
            field.innerHTML = "Adjusted Values Cannot Be Blank";
            return;
        }
        xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                result = this.responseText;
                if (result == "Completed") {
                    field.innerHTML = "Operation Completed Successfully, changes will be reflected on a refresh.";
                } else {
                    field.innerHTML = result;
                }
            }
        };
        xml.open("GET", "./responses/updatevalue.php?category=" + category + "&type=" + type + "&value=" + value, true);
        xml.send();
    }
</script>

<?php
require './view/footer.php';
?>