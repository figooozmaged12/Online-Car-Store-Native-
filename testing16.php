<?php
//connection
    $dsn = "mysql:host=localhost; dbname=shady2";
    $username = "root";
    $password= "";
    $flag = "failed";

//Passed variables from jquery
    $name = $_POST["name"];
    $Email = $_POST["Email"];
    $password1 = $_POST["password"];
    $phone = $_POST["phone"];

try{
    // MYSQLI Connection to shady2 DB
    
    include_once 'shady2_DBConn.php';
    $sql = "select username FROM users WHERE username = \"$name\";";
    $sql2 = "select email FROM users WHERE email = \"$Email\";";
    $nameResult = mysqli_query($conn,$sql);
    $emailResult = mysqli_query($conn,$sql2);
    $numOfNameRows = mysqli_num_rows($nameResult); 
    $numofEmailRows = mysqli_num_rows($emailResult);


    if($numOfNameRows > 0 ){      // Username Validation
        $flag = "usernameExist";
        } 
    elseif($numofEmailRows > 0){     // Email Validation
        $flag = "emailExist";
    }
    else{
        $conn = new PDO($dsn,$username,$password);


        if(strlen($phone)<1){ //incase the user did not enter the phone (not required).
            $sql = "INSERT INTO users (username,email,password1)\n"
            . "VALUES\n"
            . "(\"$name\",\"$Email\",\"$password1\");";
        }
        else // if the user entered the phone
        {
            $sql = "INSERT INTO users (username,email,password1,phone)\n"
            . "VALUES\n"
            . "(\"$name\",\"$Email\",\"$password1\",$phone);";
        }

            $conn->exec($sql);
            //echo "$name ,$Email,$password1,$phone  inserted successfully";
            $flag = "success";
        
    }
    }
catch(PDOException $e){
    echo "failed" . $e->getMessage();
    
}
 $conn = null;

?>
<!-- Errors -->
<script>
    var flag = "<?php echo $flag ?>";

</script>