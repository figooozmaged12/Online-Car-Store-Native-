<?php
$username = $_POST["username"];
$password = $_POST["password"];
$flag = "failed";

include_once 'shady2_DBConn.php';
$sql3 = "SELECT role FROM users WHERE username = \"$username\"";
$result3 = mysqli_query($conn,$sql3);
$rows3 = mysqli_num_rows($result3);
if($rows3){ // to set the role of the user
    while($row3 = mysqli_fetch_assoc($result3)){
        $flag2= $row3['role'];
        echo $flag2;
    }
}
$sql = "SELECT username FROM users WHERE username = \"$username\";";
$result = mysqli_query($conn,$sql);
$numOfRows = mysqli_num_rows($result);
if($numOfRows>0) // to check of username found in database
{   
    $sql2 = "SELECT password1 FROM users WHERE username = \"$username\";";
    $result = mysqli_query($conn,$sql2);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){ // to check if password match the username
        while ($row = mysqli_fetch_assoc($result)){
            
            $passwordCheck= $row['password1'] ;
        }
    }
    if($passwordCheck == $password){
        echo "password match";
        $flag = "success";
        session_start();
        $_SESSION['username'] = $username;
        
        
    }
    else
    {
        echo "password not match";
        $flag = "failed";
    }

    
    
}
elseif(!$numOfRows>0)
{
    echo "not found";
    $flag = "failed";
}

?>
<script>
    var flag = "<?php echo $flag; ?>";
    var flag2 = "<?php echo $flag2;?>";
    
</script>





