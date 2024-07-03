<?php
include_once 'shady2_DBConn.php';
try{
    $id = @$_POST['id'];
$sql = "DELETE FROM users WHERE id = $id;";

$connPDO->exec($sql);
echo "Row deleted";


}
catch(PDOException $e){
    echo "failed".$e->getMessage();
}



