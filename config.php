<?php 

$server = "localhost";
$user = "root";
$password = "";
$db = "furniture_db";

$con =mysqli_connect($server, $user, $password, $db);

if($con){
    
}else{
    ?>
    <script>
        alert("NO Connection");
    </script>
    <?php
}
?>