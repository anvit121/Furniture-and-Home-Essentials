<?php
session_start();
include("config.php");
include("includes/navbar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="author" content="MAV">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Cart-Cozy Space</title>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">
	<div class="row justify-content-center">
	<div class="col-lg-10">
		<div style="display:<?php if (isset($_SESSION['showAlert'])) {
echo $_SESSION['showAlert'];
} else {
echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong><?php if (isset($_SESSION['message'])) {
echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
		</div>
		<div class="table-responsive mt-2">
		<table class="table table-bordered table-striped text-center">
			<thead>
			<tr>
				<td colspan="7">
				<h4 class="text-center text-info m-0">Products in your cart!</h4>
				</td>
			</tr>
			<tr>
				<th>ID</th>
				<th>Image</th>
				<th>Product</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total Price</th>
				<th>
				<a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
				</th>
			</tr>
			</thead>
			<tbody>
			<?php
				require 'config.php';
				$stmt = $con->prepare('SELECT * FROM cart');
				$stmt->execute();
				$result = $stmt->get_result();
				$grand_total = 0;
				while ($row = $result->fetch_assoc()):
			?>
			<tr>
				<td><?= $row['id'] ?></td>
				<input type="hidden" class="pid" value="<?= $row['id'] ?>">
				<td><img src="<?= $row['product_image'] ?>" width="50"></td>
				<td><?= $row['product_name'] ?></td>
				<td>
				<i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2); ?>
				</td>
				<input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
				<td>
				<input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;">
				</td>
				<td><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['total_price'],2); ?></td>
				<td>
				<a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
				</td>
			</tr>
			<?php $grand_total += $row['total_price']; ?>
			<?php endwhile; ?>
			<tr>
				<td colspan="3">
				<a href="k_sink_products.php" class="btn1 btn1-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
					Shopping</a>
				</td>
				<td colspan="2"><b>Grand Total</b></td>
				<td><b><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
				<td>
				<a href="checkout.php" class="btn btn-info <?= ($grand_total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
				</td>
			</tr>
			</tbody>
		</table>
		</div>
	</div>
	</div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

<script type="text/javascript">
$(document).ready(function() {

	// Change the item quantity
	$(".itemQty").on('change', function() {
	var $el = $(this).closest('tr');

	var pid = $el.find(".pid").val();
	var pprice = $el.find(".pprice").val();
	var qty = $el.find(".itemQty").val();
	location.reload(true);
	$.ajax({
		url: 'action.php',
		method: 'post',
		cache: false,
		data: {
		qty: qty,
		pid: pid,
		pprice: pprice
		},
		success: function(response) {
		console.log(response);
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
<!-- <?php
    include("includes/footer.php");
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
</body>

</html>