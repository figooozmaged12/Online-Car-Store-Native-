
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php test</title>
</head>
<body>
    <div>hi </div>

</body>
</html>

<?php
$dsn = 'mysql:host=localhost; dbname=products'; 
$user = 'root';
$password = '123';
try{
    $db = new PDO($dsn,$user,$password);
   

}
catch(PDOException $e){
    echo 'failed'. $e->getMessage(); 

}


