
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script defer src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script defer src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>




</head>
<script>
    $(document).ready(function(){
       

        $("input").keyup(function(event){//Suggestions 
            var name = $("input").val();
            event.preventDefault();
            $.post("suggestions.php",{
                name: name
            },function(data,status){
                $(".suggestions").html  (data);
            }
            ) 
            
        })
    
        $(".searchbtn").click(function(event){//search button
            $("#edit").fadeOut();
            $(".editTitle").fadeOut();
            $("#test").fadeIn();
            var name = $("input").val();
            event.preventDefault();
            $.post("home2.php",{
                name: name
            },function(data,status){
                $("#test").html(data);
            }
            ) 
        })
       

        $('body').on('click','.edit',function(){ // Edit button
            
            
             var id = this.id;
            $.post('edit.php',{
                id: id
            },function(data,status){
                $("#edit").html(data);
                $("#test").fadeOut();
                $(".editTitle").fadeIn();
                $("#edit").fadeIn();
                
            })
            
        })

        $('body').on('click','.save',function(event){ // Save button
            var id = this.id;      
            var username = $("#"+id+"name").val();     
            var Email = $("#"+id+"email").val();          
            var password = $("#"+id+"password").val();
            var phone = $("#"+id+"phone").val();
            event.preventDefault();
            $.post("savingEdit.php",{
                id: id,
                username: username,
                Email: Email,
                password: password,
                phone: phone
            },function(data,status){
                $(".result2").html(data);
                $(".result2").fadeIn(1000).delay(1000).fadeOut(1000);
                $(".result3").html(flag);
            })
            
        })

        $('body').on('click','.remove',function(){ // Delete Buttton
            var id = this.id;
            $.post("delete.php",{id:id},function(data,status){
                $(".deleteResult").html(data);
                $(".deleteResult").fadeIn(1000).delay(1000).fadeOut(1000);
                
            })
        })
   
        })
</script>

<body>
   
    <div class ="home">admin page</div>
    <div class="container">
        <form method="POST">
            <input class="search" type="text" name="search" placeholder="search for user" list="names">
            <button class="searchbtn">search</button>  
            
                <datalist id = "names">
                    <div class="suggestions"></div>     
                </datalist>
        </form>
        <a href="testing15.html"><button class="addbutton">New User</button></a>
    </div>
    <br>
    <div id="test"></div>
    <div id="test2"></div>
    <div class="editTitle">Edit</div>

    <div id="edit"> </div>

    <div class="result2"></div>
    <div class="result3"></div>
    <div class="deleteResult"></div>
    

</body>
<?php
session_start();
echo "hello ".$_SESSION['username'];
?>
</html>
<style>
    body{
        height: 2000px;
    }
    .home{
        background-color: rgb(76, 76, 196);
        width: auto;
        height: 80px;
        padding: 10px;
        color: white;
        text-align: center;
        font-size: 35px;
        font-weight: bold;
        
    }
    .search
    {   position: relative;
        left: 40%;
        top: 20px;
        
        width: 20%;
        border: 1px solid rgb(88, 88, 88);
        padding: 10px;
        border-radius: 10px;
    }
    .searchbtn
    {   position: relative;
        left: 40%;
        top: 20px;
        background-color:  rgb(76, 76, 196);
        width: 10%;
        border: 1px solid rgb(79, 79, 79);
        padding: 10px;
        border-radius: 10px;
        color: white;
    }
    .addbutton{
        position: relative;
        left: 71%;
        top: -25px;
        background-color:  rgb(76, 76, 196);
        width: 10%;
        border: 1px solid rgb(79, 79, 79);
        padding: 10px;
        border-radius: 10px;
        color: white;
    }
    .gg{
        text-align: center;
        position: relative;
        top: 50px;
    }
    
    .searchResult
    {
        background-color: transparent;
        border: 1px solid grey;
        border-radius: 5px;
        position: relative;
        left: 44%;
        width: 12%;


    }
    .save{
        color: white;
        background-color: #53565A;
        border-radius: 5px;
    }
    .edit{
        color: white;
        background-color: #53565A;
        border-radius: 5px;
      

    }
    .remove{
        color: white;
        background-color: rgb(76, 76, 196);
        border-radius: 5px;
        
        
    }
    .editTitle{
        display: none;
        background-color: rgb(76, 76, 196);
        width: auto;
        height: 80px;
        padding: 10px;
        color: white;
        text-align: center;
        font-size: 35px;
        font-weight: bold;
    }
    .result2{
        text-align: center;
    background-color: #def1d7;
    padding: 10px;
    margin: 5px;
    left: 350px;
    width: 705px;
    border-radius: 3px;
    height: 50px;
    position: relative;
    display: none;
    }
    .deleteResult
    {
    text-align: center;
    background-color: #def1d7;
    padding: 10px;
    margin: 5px;
    left: 350px;
    width: 705px;
    border-radius: 3px;
    height: 50px;
    position: relative;
    display: none;

    }
    

</style>


