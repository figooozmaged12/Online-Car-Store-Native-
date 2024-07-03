<?php

include_once 'shady2_DBConn.php';

    $name2 = @$_POST['name']."%";
    $sql = "SELECT * FROM `users` WHERE username LIKE \"$name2\";";
    $result = mysqli_query($conn,$sql);
    $rows= mysqli_num_rows($result);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            echo "<option class = 'suggestions'>".$row['username']."<br>" ."</option>";

        }
    }





?>