<?php
$name = $_POST['name'];
if ($name == "electric cars"){
    $type = "electric";
}
elseif($name = "gas cars"){
    $type = "gas";
}

include_once 'shady2_DBConn.php';
$sql = "SELECT * FROM `cars` WHERE type =\"$type\";";
$result = mysqli_query($conn,$sql);
$rows = mysqli_num_rows($result);
if($rows){
    while($row = mysqli_fetch_assoc($result)){
            echo "<img id="."'".$row['model']."'"." class='cars' src="."'".$row['img']."'".">"."<br>";
            echo $row['model']."<br>";         
            echo $row['available']." available"."<br>";
                
            
    }
}

?>
<script>
    var user = "<?php session_start(); echo $_SESSION['username']; ?>";
</script>

 
