<?php
try{
    // variables
    $id = @$_POST['id'];
    $username = @$_POST['username'];
    $Email =@ $_POST['Email'];
    $password=@$_POST['password'];
    $phone =@$_POST['phone'];
    include_once 'shady2_DBConn.php';
    //queries
    $sql = "SELECT username FROM users WHERE id = $id;";
    $sql2 = "SELECT email FROM users WHERE id = $id;";
    $sql3 = "SELECT username FROM `users` WHERE username = \"$username\";";
    $sql4 = "SELECT email FROM `users` WHERE email = \"$Email\";";
    $sql5 = "UPDATE users\n"
        
            . "SET username = \"$username\", email = \"$Email\",password1=\"$password\",phone=$phone\n"
        
            . "WHERE id = $id;";
    //results
    $result = mysqli_query($conn,$sql);
    $result2= mysqli_query($conn,$sql2);
    $result3= mysqli_query($conn,$sql3);
    $result4= mysqli_query($conn,$sql4);
    //rows
    $rows = mysqli_num_rows($result);
    $rows2 = mysqli_num_rows($result2);
    $rows3 = mysqli_num_rows($result3);
    $rows4 = mysqli_num_rows($result4);
    //checks
    if($rows >0){ //check if user changed the username
        while($row = mysqli_fetch_assoc($result)){
            $usernameCheck = $row['username'];
            

        }
    }
    if($rows2 >0){//check if user changed the email
        while($row2 = mysqli_fetch_assoc($result2)){
            $emailCheck = $row2['email'];
            

        }
    }
    if($rows3>0){ // check if username exist  
            $userExist = "yes";
        }
        else{
            $userExist="no";

    }
    if($rows4>0){// check if email existt
            $emailExist = "yes";
        }
        else{
        $emailExist = "no";
    }


    if($usernameCheck==$username && $emailCheck == $Email){
        
            
            $connPDO->exec($sql5);
            $msg = "data Modified.";  
    
    } // if username or email are not changed

    elseif($usernameCheck!=$username && $userExist =="yes")
        {
            $msg = "Username Exist";

    }// if username changed & username exist

    elseif($emailCheck!=$Email && $emailExist == "yes"){
            $msg= "Email Exist";
    }// if email changed & email exist

    elseif(($usernameCheck!=$username ||$emailCheck!=$Email)&&($userExist =="no"||$emailExist=="no")){
             $connPDO->exec($sql5);
            $msg = "data modified successfully(username or email changed)";

    }// if username & email changed and both doesnot exist
    echo $msg;

   
    
    
        
     
    
  
    
}
catch(PDOException $e){
    echo "failed".$e->getMessage();
}
