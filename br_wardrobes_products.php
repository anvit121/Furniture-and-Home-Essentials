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
    <title>Products- Cozy Space</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon.jpg" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    
</head>
<body>
    <div class="container">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a href="index.php" class="breadcrumbs__link">Home</a>
            </li>
            <li class="breadcrumbs__item">
                <a href="Rooms/rooms.php" class="breadcrumbs__link">Rooms</a>
            </li>
            <li class="breadcrumbs__item">
                <a href="Rooms/bedroom.php" class="breadcrumbs__link">Bedroom</a>
            </li>
            <li class="breadcrumbs__item">
                <a href="br_wardrobes_products.php" class="breadcrumbs__link breadcrumbs__link--active">Products</a>
            </li>
        </ul>

        <div id="message"></div>
            <div class="row mt-2 pb-3">
            <?php
                    include 'config.php';
                    $stmt = $con->prepare('SELECT * FROM bedroom_wardrobe');
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()):
                ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                <div class="card-deck">
                <div class="card p-2 border-secondary mb-2">
                    <img src="<?= $row['product_image'] ?>" class="card-img-top" height="250">
                    <div class="card-body p-1">
                    <h4 class="card-title text-center text-info"><?= $row['product_name'] ?></h4>
                    <h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?>/-</h5>

                    </div>

            <div class="card-footer p-1">
            <form action="" class="form-submit">
                <div class="row p-2">
                <div class="col-md-6 py-1 pl-4">
                    <b>Quantity </b>
                </div>
                <div class="col-md-6">
                    <input type="number" class="form-control pqty" value="1">
                </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    <?php endwhile; ?>
    </div>

</div>
    <?php
        include("includes/footer.php");
    ?>

    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            // Send product details in the server
            $(".addItemBtn").click(function(e) {
            e.preventDefault();
            var $form = $(this).closest(".form-submit");
            var pid = $form.find(".pid").val();
            var pname = $form.find(".pname").val();
            var pprice = $form.find(".pprice").val();
            var pimage = $form.find(".pimage").val();
            var pcode = $form.find(".pcode").val();

            var pqty = $form.find(".pqty").val();

            $.ajax({
                url: 'action.php',
                method: 'post',
                data: {
                pid: pid,
                pname: pname,
                pprice: pprice,
                pqty: pqty,
                pimage: pimage,
                pcode: pcode
                },
                success: function(response) {
                $("#message").html(response);
                window.scrollTo(0, 0);
                load_cart_item_number();
                }
            });
            });

            // Load total no.of items added in the cart and display in the navbar
            load_cart_item_number();

            function load_cart_item_number() {
            $.ajax({
                url: 'action.php',
                method: 'get',
                data: {
                cartItem: "cart_item"
                },
                success: function(response) {
                $("#cart-item").html(response);
                }
            });
            }
        });
    </script>

</body>
</html>