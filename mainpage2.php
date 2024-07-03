
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script defer src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script defer src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">  
<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">  
<script defer src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




</head>
<body>
    <div class ="home">home page</div>
    <div class="user">welcome</div>
    <div class="container">
        <table  class='products' >
            <th>all products</th>

            <tr><td class = "electricCars">electric cars</td></tr>

            <tr><td class="gasCars">gas cars</td></tr>
                
            <tr><td>motocylces</td></tr>

            <tr><td>electric motocylces</td></tr>

            <tr><td>electric bike</td></tr>
        </table>
        <div class= "container2"> <br><br>
            <div class = "data1"></div>
            <div class = "purchase1"></div>

            <div style="display: none;" class ="purchasemsg">
                <img style="width:100px; height:100px;"  src="cars/green.png" >
                 your purchase was successful

            </div>
            <div class="msg">ss</div>
            
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        
        var user = "<?php session_start(); echo $_SESSION['username']?>";
        $(".user").html("welcome "+user); // to set the username by sessions
       
        $(".electricCars").click(function(){ // electric cars button
            var name = $(".electricCars").html();
            
             $.post("mainpage.php",{name: name},function(data,status){
                $(".purchasemsg").hide();
                $(".purchase1").hide();
                $(".data1").fadeIn();
                $(".data1").html(data);
                
                
            })
        })

        $(".gasCars").click(function(){ // gas cars button
            var name = $(".gasCars").html();
            
             $.post("mainpage.php",{name: name},function(data,status){
                $(".purchasemsg").hide();
                $(".purchase1").hide();
                $(".data1").fadeIn();
                $(".data1").html(data);

             })
        
        
            
      
        })
        
        $('body').on('click','#teslamodel3',function(){ // choosing car btn1(electic)
            $(".data1").hide();
            $(".purchase1").html("<img class='purchaseimg' src='cars/1 Tesla Model 3.jpg' />"+"<button id='teslamodel3' class='purchasebtn'>buy now</button>")
            $(".purchase1").fadeIn();
            
        })

        $('body').on('click','#teslamodels',function(){ // choosing car btn2(electric)
            $(".data1").hide();
            $(".purchase1").html("<img class='purchaseimg' src='cars/TeslaModels black.jpg' />"+"<button id='teslamodels' class='purchasebtn'>buy now</button>")
            $(".purchase1").fadeIn();
            
        })

        $('body').on('click','#mercedes_c180_white',function(){ // choosing car btn3(gas)
            $(".data1").hide();
            $(".purchase1").html("<img class='purchaseimg' src='cars/mercedesc180White.jpeg' />"+"<button id='whiteMercedes' class='purchasebtn'>buy now</button>")
            $(".purchase1").fadeIn();
            
        })

        $('body').on('click','#mercedes_c180_black',function(){ // choosing car btn4(gas)
            $(".data1").hide();
            $(".purchase1").html("<img class='purchaseimg' src='cars/mercedesc180 black.avif' />"+"<button id='blackMercedes' class='purchasebtn'>buy now</button>")
            $(".purchase1").fadeIn();
            
        })

        $('body').on('click','.purchasebtn',function(){ // purchace btn
            $(".purchase1").hide();
            $(".purchasemsg").fadeIn();
             var carname = $(".purchasebtn").attr('id');
            $.post("purchase.php",{carname:carname},function(data,status){
                $(".msg").html(data);

            })

        })



    }) // end of document.ready
    
</script>
<style>
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
    .user{
        text-align: center;
        width: auto;
        font-size: 20px;


    }
    .products
    {   position: relative;
        top: 50px;
       font-size: 15px;


    }
    .data1{

    position: absolute;
    left: 30%;
    top: 26%;
    }
    .cars{
        width: 250px;
        height: 150px;
        cursor: pointer;
    }
    .purchaseimg{
        width: 500px;
        height: 300px;
        position: absolute;
        top: 21%;
        left: 35%;
    }
    .purchasebtn{
        width: 150px;
        height: 40px;
        position: absolute;
        top: 63%;
        left: 47%;
        border-radius: 5px;
        border: 1px solid white;

        background-color: #bd0101;
        color: white;
        font: bold;
    }
    .purchasemsg{
        position: absolute;
        top: 35%;
        left: 38%;

    }
    table,th{
        border: 1px solid white;
    }

    th{
        color: white;
        background-color: black;
        width: 200px;
        height: 50px;
        text-align: center;
    }
    td{
        cursor: pointer;
        padding: 10px;
        
        background-color: rgb(222, 231, 236);
        color: black;
        text-align: center;
    }
    
</style>