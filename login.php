<?php 
    session_start();
    include("config.php");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account- MAV</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon.jpg" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    
    
</head>
<body>

    <div class="container-login">
        
        <div>
            <h2>Sign In</h2>
        </div>
        <div>
        <form action="login.php" method="post" class="form">

            <div class="input-field">
                <label class="input-label">Email</label>
                <input type="text" class="input" name="c_email" placeholder="Enter Your Email" required><br>
            </div>

            <div class="input-field">
                <label class="input-label">Password</label>
                <input type="password" class="input" name="c_pass" placeholder="Enter Your Password" minlength="8" required>
            </div>

            <div class="text-center">
                <button type="submit" name="login" class="btn btn-primary">
                    <i class="fa fa-user-md"></i> Login
                </button>
                <p>Don't have an account? <a href="register.php">Register</a></p>

            </div>
        </form>
    
</div>
        <script src="js/jquery-3.6.0.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
</body>
</html>

<?php 

if(isset($_POST['login'])){
    
    $customer_email = $_POST['c_email'];
    
    $customer_pass = $_POST['c_pass'];
    
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $check_customer = mysqli_num_rows($run_customer);
    
    
    if($check_customer==0){
        
        echo "<script>alert('Your email or password is wrong')</script>";
        
        
    }else{
        $insert_customer = "insert into login_logs (customer_email) values ('$customer_email')";
    
        $run_customer = mysqli_query($con,$insert_customer);
        
        $_SESSION['customer_email']=$customer_email;
        
        echo "<script>alert('You are Logged in')</script>"; 
        
        echo "<script>window.open('Rooms/rooms.php','_self')</script>";
    }
    
    
}

?>

