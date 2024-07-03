<?php //search page

include_once 'shady2_DBConn.php';
    $name = $_POST['name'];
    
   
    if(is_numeric($name)=="1")
    {
        //$sql = "SELECT * FROM `users` WHERE id = $name;";
        $sql = "SELECT * FROM users u LEFT JOIN tesla t on u.id = t.userID WHERE id =$name UNION SELECT * FROM users u LEFT JOIN mercedes m ON u.id = m.userID WHERE id = $name;";
       

      
    }
    else
    
    {   $name = $_POST['name']."%";
        //$sql = "SELECT * FROM users u LEFT JOIN mercedes m ON u.id = m.userID WHERE username like \"$name\"; UNION LEFT JOIN tesla t ON u.id = t.userID WHERE username like \"$name\";";
        $sql = "SELECT * FROM users u LEFT JOIN tesla t on u.id = t.userID WHERE username like \"$name\" UNION SELECT * FROM users u LEFT JOIN mercedes m ON u.id = m.userID WHERE username like \"$name\";";
        //$sql = "SELECT * FROM `users` WHERE username LIKE \"$name\";";
    }
    
    $result = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
    if($result){
        echo "<table id='example' class='table table-striped' style='width:100%'>";
        echo "<thead>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>Email</th>
            <th>password1</th>  
            <th>phone</th>
            <th>role</th>
            <th>carID</th>
            <th>modelName</th>
            <th>color</th>
            <th>Edit</th>
            <th>Remove</th>
        </tr>
    </thead>";
    echo"<tbody>" ;
    while($row = mysqli_fetch_assoc($result)){
        echo"<tr>
                <td>".$row['id']."</td>
                <td>".$row['username']."</td>
                <td>".$row['email']."</td>
                <td>".$row['password1']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['role']."</td>
                <td>".$row['carId']."</td>
                <td>".$row['modelName']."</td>
                <td>".$row['color']."</td>
                <td>"."<button class='edit' id="."'".$row['id']."'".">edit</button>"."</td>
                <td>"."<button class='remove'id="."'".$row['id']."'".">delete</button>"."</td>


            </tr>";
        
            }
        echo " </tbody>  
    </table>";
        }

            
            

        
        
        
        
    
        ?>