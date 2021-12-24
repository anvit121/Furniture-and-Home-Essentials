<?php 

    session_start();
    include("config.php");
    include("includes/navbar.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- LINK FOR STYLE.CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">

    <title>&copy; Cozy Space</title>

</head>
<body>
    <!-- HEADING TAG -->
    <!-- <a href=""><h2>Furniture</h2></a> -->

        <section id="hero">
            <div class="bg-brown">
                <div class="content-hero">
                    <h3>#COZYSPACEhomestories</h3>
                    <p>We at COZY SPACE are here to inspire you with affordable home furniture solutions, 
                        there is a piece of furniture to every corner of your home. 
                        Create a home that is perfect for you.</p>
                    <div>
                        <a href="./login.php" class="btn btn-interior">Visit</a>
                    </div>
                </div>
            </div>
                <img class="img-hero" src="img/hp1.jpg" alt="home-page">
            </div>
        </section>

        <hr>

        <section id="section-2">
            <div class="container">
                <h2 class="text-center">Hot Deals!!</h2>

                <div class="row">
                    <div class="col-md-4">
                        <div class="box-pad">
                            <div class="box">
                                <img src="img/everyday_ess.jpg" alt="Product-1">
                                <p>Everyday <br> Essentials </p>
                                <div>
                                    <a href="Rooms/rooms.php" class="btn btn-interior">Visit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box-pad">
                            <div class="box">
                                <img src="img/iconic_prods.jpg" alt="Product-1">
                                <p>Our Most Iconic Products</p>
                                <div>
                                    <a href="iconic_products.php" class="btn btn-interior">Visit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box-pad">
                            <div class="box">
                                <img src="img/essen-1.jpg" alt="Product-1">
                                <p>Office <br> Collection</p>
                                <div class="btn btn-interior">Visit</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="section-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="specials">This Week's Special</h2>
                        <img class="package" src="img/package-2.jpg" alt="">
                    </div>

                    <div class="col-md-6 right-side">
                        <div class="top">
                            <h4>Package Deal!</h4>
                            <p>User ratings</p>
                            <p>Rs. 65,999</p>
                        </div>
                        <div class="bottom">   
                            <p>Includes:</p>
                            <ul>
                                <li>2 - Seater Sofa</li>
                                <li>4 Pillows</li>
                                <li>2 Side Tables</li>
                                <li>2 Lamps</li>
                            </ul>
                            <div class="btn btn-interior">Visit</div>
                        </div>
                    </div>

                </div>
            </div>
</section>
    <!-- <?php 
        include("./includes/footer.php");
    ?> -->

<div id="footer">
    <div class="row">
        <div class="col">
            <h1>COZY SPACE</h1><br>
            <p>Get exclusive offers, inspiration, and lots more to help bring your ideas to life. All for free.</p>
            <br><br>
            <h3>Terms & conditions:</h3>
            <p>Proof of Delivery is now digital hence POD’s with OTP provided by customers - will be considered the final acceptance of the articles without any damages</p>
        </div>
        <div class="col">
            <h3>Contact us</h3>
            <a href="https://gmail.com" class="email-id" ><h4>Email- mlamvp@gmail.com</h4></a>
            
            <h6>Mudra Limbasia: +91-9930950101</h6>
            <h6>Vedant Patil: +91-9619995427</h6>
            <h6>Anvit Mirjurkar: +91-9819420748</h6><br>
            <h3>Privacy Policy</h3>
            <p>We make sure our trusted service partners keep your personal information safe.</p>
        </div>
        <div class="col">
            <h3>Services</h3>
            <p>Order and Pickup: N/A due to Covid-19 Guidelines. </p>
            <br><p>Home Delivery.</p><br><br>
            
        </div>
    </div>
    <hr>
    <p class="copyright"> &copy; &nbsp; Cozy Space 2021</p>
</div>


        <!-- <section id="footer">
            <p class="text-1">
            &copy; By Furniture Vala.com |
            Privacy Policy|
            Contact: 9820546782 |
            Email us: mlamvp1@gmail.com 
            </p>
        </section> -->

</body>
</html>