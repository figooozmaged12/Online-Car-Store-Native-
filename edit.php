<?php


include_once 'shady2_DBConn.php';
$id = $_POST['id'];




$sql = "SELECT * FROM `users` WHERE id =  $id ";



$result = mysqli_query($conn,$sql);
$rows = mysqli_num_rows($result);
if($result)
{
    while($row = mysqli_fetch_assoc($result)){
        echo "<table     id='example' class='table table-striped' style='width:100%'>".
        "<thead><tr><th>id</th><th>username</th><th>Email</th><th>password1</th><th>phone</th><th>Edit</th></tr></thead>".
        "<br>".
        "   <td>".$row['id']."</td>
            <td> <input id= "."'".$row['id']."name"."'"." type='text'value ="."'".$row['username']."'"."></td>
            <td> <input id= "."'".$row['id']."email"."'"." type='text'value ="."'".$row['email']."'"."></td>
            <td> <input id= "."'".$row['id']."password"."'"." type='text'value ="."'".$row['password1']."'"."></td>
            <td> <input id= "."'".$row['id']."phone"."'"."type='text'value ="."'".$row['phone']."'"."></td> 
            <td> <button id="."'".$row['id']."'"." class = 'save'>save</button> </td>";


    }
}


    
    
  