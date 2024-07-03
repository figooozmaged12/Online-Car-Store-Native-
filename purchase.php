<?php
session_start();
$username = $_SESSION['username'];
include_once 'shady2_DBConn.php';
$carname = $_POST['carname'];
if($carname == "whiteMercedes"){ //purchase white mercedes
    $status = "owned";
    $number=100;
    while($status == "owned"){ // loop to check if car is owned or not
        
        $sql = "SELECT carStatus FROM mercedes WHERE carId =$number;";
        $result = mysqli_query($conn,$sql);
        $rows= mysqli_num_rows($result);
            if($rows){
                while($row = mysqli_fetch_assoc($result)){
                    $status= $row['carStatus'];
                    if($status == "owned"){
                        $number++; 
                    }

                }
            }

    }
   
    $sql3 = "SELECT id from users WHERE username = \"$username\";";
    $result3 = mysqli_query($conn,$sql3);
    $rows3= mysqli_num_rows($result3);
    if($rows3){
        while($row3 = mysqli_fetch_assoc($result3)){
            $id = $row3['id'];

        }
    }
    try{
        
        $sql5 = "UPDATE `mercedes` SET `userID` = $id, `carStatus` = \"owned\" WHERE `mercedes`.`carId` = $number;";
        $connPDO->exec($sql5);
        echo "whitecar with id = $number successfully and id =$id is set successfully";
    }
    catch(PDOException $e){
        echo "failed id". $e;

    }


}
else if($carname == "blackMercedes"){ // purchase black mercedes
    $status = "owned";
    $number=130;
    while($status == "owned"){ // loop to check if car is owned or not
        
        $sql = "SELECT carStatus FROM mercedes WHERE carId =$number;";
        $result = mysqli_query($conn,$sql);
        $rows= mysqli_num_rows($result);
            if($rows){
                while($row = mysqli_fetch_assoc($result)){
                    $status= $row['carStatus'];
                    if($status == "owned"){
                        $number++; 
                    }

                }
            }

    }
    $sql3 = "SELECT id from users WHERE username = \"$username\";";
    $result3 = mysqli_query($conn,$sql3);
    $rows3= mysqli_num_rows($result3);
    if($rows3){
        while($row3 = mysqli_fetch_assoc($result3)){
            $id = $row3['id'];

        }
    }
    try{
        
        $sql5 = "UPDATE `mercedes` SET `userID` = $id, `carStatus` = \"owned\" WHERE `mercedes`.`carId` = $number;";
        $connPDO->exec($sql5);
        echo "blackcar with id = $number successfully and id =$id is set successfully";
    }
    catch(PDOException $e){
        echo "failed id". $e;

    }




}
else if($carname == "teslamodel3"){
    $status = "owned";
    $number=1;
    while($status == "owned"){ // loop to check if car is owned or not
        
        $sql = "SELECT carStatus FROM tesla WHERE carId =$number;";
        $result = mysqli_query($conn,$sql);
        $rows= mysqli_num_rows($result);
            if($rows){
                while($row = mysqli_fetch_assoc($result)){
                    $status= $row['carStatus'];
                    if($status == "owned"){
                        $number++; 
                    }

                }
            }

    }
    $sql3 = "SELECT id from users WHERE username = \"$username\";";
    $result3 = mysqli_query($conn,$sql3);
    $rows3= mysqli_num_rows($result3);
    if($rows3){
        while($row3 = mysqli_fetch_assoc($result3)){
            $id = $row3['id'];

        }
    }
    try{
        
        $sql5 = "UPDATE `tesla` SET `userID` = $id, `carStatus` = \"owned\" WHERE `tesla`.`carId` = $number;";
        $connPDO->exec($sql5);
        echo "teslaredcar with id = $number successfully and id =$id is set successfully";
    }
    catch(PDOException $e){
        echo "failed id". $e;

    }



}
else if($carname=="teslamodels"){
    $status = "owned";
    $number=14;
    while($status == "owned"){ // loop to check if car is owned or not
        
        $sql = "SELECT carStatus FROM tesla WHERE carId =$number;";
        $result = mysqli_query($conn,$sql);
        $rows= mysqli_num_rows($result);
            if($rows){
                while($row = mysqli_fetch_assoc($result)){
                    $status= $row['carStatus'];
                    if($status == "owned"){
                        $number++; 
                    }

                }
            }

    }
    $sql3 = "SELECT id from users WHERE username = \"$username\";";
    $result3 = mysqli_query($conn,$sql3);
    $rows3= mysqli_num_rows($result3);
    if($rows3){
        while($row3 = mysqli_fetch_assoc($result3)){
            $id = $row3['id'];

        }
    }
    try{
        
        $sql5 = "UPDATE `tesla` SET `userID` = $id, `carStatus` = \"owned\" WHERE `tesla`.`carId` = $number;";
        $connPDO->exec($sql5);
        echo "teslablackcar with id = $number successfully and id =$id is set successfully";
    }
    catch(PDOException $e){
        echo "failed id". $e;

    }




}
else{
    echo "error";
}




// $sql = "UPDATE `mercedes` SET `carStatus` = \'owned\' WHERE `mercedes`.`carId` = $number;";

