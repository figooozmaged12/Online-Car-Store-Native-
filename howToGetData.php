<?php 
//how to get the data from database
include_once 'shady2_DBConn.php';
$query = "SELECT *  FROM   users;";
$result = mysqli_query($conn,$query);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
    while ($row = mysqli_fetch_assoc($result)){
        echo $row['username'] .$row['emal'].$row['password1']. "<br>";
    }
}


