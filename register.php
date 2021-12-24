<?php 
    session_start();
    $active='Account';
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
<body class="body-register">
    <div class="container-register">
        <div>
            <h2>Sign Up</h2>
        </div>
        <div>
        <form action="register.php" method="post" class="form">
            <div class="input-field">
                <label class="input-label">Name</label>                
                <input type="text" class="input" name="c_name" placeholder=" Enter Your Name" required><br>
            </div>

            <div class="input-field">
                <label class="input-label">Email</label>
                <input type="text" class="input" name="c_email" placeholder="Enter Your Email" required><br>
            </div>

            <div class="input-field">
                <label class="input-label">Contact</label>
                <input type="text" class="input" name="c_contact" placeholder="Enter Your Contact" minlength="10" maxlength="10" required>
            </div>

            <div class="input-field">
                <label class="input-label">Country</label>
                <input type="text" class="input" name="c_country" placeholder="Enter Your Country" required>
            </div>

            <div class="input-field">
                <label class="input-label">City</label>
                <input type="text" class="input"  name="c_city" placeholder="Enter Your City" required>
            </div>

            

            <!-- <div class="input-field">
                <label class="input-label">Address</label>
                <input type="text" class="input" name="c_address" placeholder="Address" required>
            </div> -->

            <div class="input-field">
                <label class="input-label">Password</label>
                <input type="password" class="input" name="c_pass" placeholder="Enter Your Password" minlength="8" required>
            </div>

            <div class="text-center">
                <button type="submit" name="register" class="btn btn-primary">
                    <i class="fa fa-user-md"></i> Register
                </button>
                <p>Already have an account? <a href="login.php">Login</a></p>

            </div>
        </form>
        
        </div>

        <script src="js/jquery-3.6.0.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php 

if(isset($_POST['register'])){
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];

    $c_contact = $_POST['c_contact'];
    
    $c_country = $_POST['c_country'];
    
    $c_city = $_POST['c_city'];

    $c_pass = $_POST['c_pass'];

    // $c_pass = password_hash($pass, PASSWORD_BCRYPT);

    $email_query = "SELECT * FROM customers WHERE customer_email='$c_email'";
    $query = mysqli_query($con,$email_query);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){

        echo "<script>alert('Email Already Exists')</script>";

    }else{

        $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact')";
    
        $run_customer = mysqli_query($con,$insert_customer);

        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('You have been Registered Sucessfully')</script>";
        
        echo "<script>window.open('login.php','_self')</script>";
    
}
    
    // $sel_cart = "select * from cart where ip_add='$c_ip'";
    
    // $run_cart = mysqli_query($con,$sel_cart);
    
    // $check_cart = mysqli_num_rows($run_cart);
    
    // if($check_cart>0){
        
    //     /// If register have items in cart ///
        
    //     $_SESSION['customer_email']=$c_email;
        
    //     echo "<script>alert('You have been Registered Sucessfully')</script>";
        
    //     echo "<script>window.open('checkout.php','_self')</script>";
        
    // }else{
        
    //     /// If register without items in cart ///
        
    //     $_SESSION['customer_email']=$c_email;
        
    //     echo "<script>alert('You have been Registered Sucessfully')</script>";
        
    //     echo "<script>window.open('index.php','_self')</script>";
        
    // }
    
    }
?>