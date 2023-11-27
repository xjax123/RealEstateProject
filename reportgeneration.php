<?php
    require_once './backend/dbConnect.php';
    $s = $_GET['selector'];
    $m = $_GET['month'];
    $y = $_GET['year'];
    
    if ($m == "00") {
        $m = "";
    }
    $conn = connect();
    $stringBuilder = "";
    if ($s =="sales") {
        $result;
        if ($m == "" && $y == "") {
            $result = $conn->query('SELECT COUNT(`Status`), RealtorID, accounts.Username, accounts.Name FROM `properties` INNER JOIN accounts ON properties.RealtorID = accounts.AccountID WHERE `Status` = "Sold" GROUP BY RealtorID ORDER BY COUNT(`Status`) DESC;');
        } else if ($m == "" && $y != "") {
            $result = $conn->query('SELECT COUNT(`Status`), RealtorID, accounts.Username, accounts.Name FROM `properties` INNER JOIN accounts ON properties.RealtorID = accounts.AccountID WHERE `Status` = "Sold" AND `TakenDownDate` BETWEEN \''.$y.'/01/01\' AND \''.$y.'/12/30\' GROUP BY RealtorID ORDER BY COUNT(`Status`) DESC;');
        } else if ($m != "" && $y != ""){
            
            $result = $conn->query('SELECT COUNT(`Status`), RealtorID, accounts.Username, accounts.Name FROM `properties` INNER JOIN accounts ON properties.RealtorID = accounts.AccountID WHERE `Status` = "Sold" AND `TakenDownDate` BETWEEN \''.$y.'/'.$m.'/01\' AND \''.$y.'/'.$m.'/30\' GROUP BY RealtorID ORDER BY COUNT(`Status`) DESC;');
        } else {
            echo 'Search Failed: Please Input a Year, or leave both blank.';
            return;
        }
        $stringBuilder .= '<table class="outputTable">
        <thead>
            <tr>
                <th>Sold</th>
                <th>Username</th>
                <th>Full Name</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($result as $row) {
         $stringBuilder .= '
         <tr>
             <td>'.$row['COUNT(`Status`)'].'</td>
             <td>'.$row['Username'].'</td>
             <td>'.$row['Name'].'</td>
         </tr>';
        }
        $stringBuilder .= '</tbody></table>';
    } else if ($s == "property") {
        //Im not really sure what you meant by popularity, but i figured the best measure of that would be the number sold.
        $result;
        if ($m == "" && $y == "") {
            $result = $conn->query('SELECT COUNT(`Status`), Type FROM `properties` WHERE `Status` = "Sold" GROUP BY Type ORDER BY COUNT(`Status`) DESC;');
        } else if ($m == "" && $y != "") {
            $result = $conn->query('SELECT COUNT(`Status`), Type FROM `properties` WHERE `Status` = "Sold" AND `TakenDownDate` BETWEEN \''.$y.'/01/01\' AND \''.$y.'/12/30\' GROUP BY Type ORDER BY COUNT(`Status`) DESC');
        } else if ($m != "" && $y != ""){
            
            $result = $conn->query('SELECT COUNT(`Status`), Type FROM `properties` WHERE `Status` = "Sold" AND `TakenDownDate` BETWEEN \''.$y.'/'.$m.'/01\' AND \''.$y.'/'.$m.'/30\' GROUP BY Type ORDER BY COUNT(`Status`) DESC');
        } else {
            echo 'Search Failed: Please Input a Year, or leave both blank.';
            return;
        }
        $stringBuilder .= '<table class="outputTable">
        <thead>
            <tr>
                <th>Sold</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>';
        foreach ($result as $row) {
         $stringBuilder .= '
         <tr>
             <td>'.$row['COUNT(`Status`)'].'</td>
             <td>'.$row['Type'].'</td>
         </tr>';
        }
        $stringBuilder .= '</tbody></table>';
    } else {
       $result = $conn -> query('SELECT * FROM accounts WHERE AccountType = "Customer" ORDER BY Logins DESC LIMIT 3;');
       
       $stringBuilder .= '<table class="outputTable">
       <thead>
           <tr>
               <th>Name</th>
               <th>Username</th>
               <th>Visits</th>
           </tr>
       </thead>
       <tbody>';
       foreach ($result as $row) {
        $stringBuilder .= '
        <tr>
            <td>'.$row['Name'].'</td>
            <td>'.$row['Username'].'</td>
            <td>'.$row['Logins'].'</td>
        </tr>';
       }
       $stringBuilder .= '</tbody></table>';
    }
    echo $stringBuilder;
?>