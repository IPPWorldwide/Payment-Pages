<?php
include("php-class.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Payment Getway #3</title>
		<link rel="stylesheet" type="text/css" href="css/fancybox.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		
	</head>
	<body>
		<nav>
			<a href="index">Design #1</a>
			<a href="index-2.php">Design #2</a>
			<a href="index-3.php">Design #3</a>
			<a href="index-4.php">Design #4</a>
			<a href="index-5.php">Design #5</a>
			<a href="index-6.php">Design #6</a>
			<a href="index-7.php">Design #7</a>
			<a href="index-8.php">Design #8</a>
			<a href="index-9.php">Design #9</a>
			<a href="index-10.php">Design #10</a>
		</nav>

		<div id="paymentPopup" class="payment-getway-main design-6">
		    <div class="payment-getway-inner">
		        <div class="payment-header">
		            <h3>Payment Details</h3>
		        </div>
		        <div class="payment-middle">
		            <form id="myform" action="confirmedpayment.php" class="search-form paymentWidgets" data-brands="VISA MASTER" data-theme="divs"></form>
					<div class="payment-filed text-center"><span class="payment-icon"><img src="images/payments-icon.png" alt=""></span></div>
		        </div>
		    </div>
		</div>

		<!-- <script type="text/javascript" src="js/creditCardValidator.js"></script> -->
		<script type="text/javascript" src="js/fancybox.min.js" charset="utf-8"></script>
		<script type="text/javascript" src="js/payform.js" charset="utf-8"></script>
		<script type="text/javascript" src="js/custom.js" charset="utf-8"></script>

		<script>
		    var payment_settings = {
		        "payw_failed_payment"       :   "Payment Failed. Please try again.",
		        "payw_cardholder"           :   "CUSTOMER NAME",
		        "payw_cardno"               :   "CREDIT CARD NUMBER",
		        "payw_expmonth"             :   "EXPIRATION DATE",
		        "payw_expyear"              :   "Expiry year",
		        "payw_cvv"                  :   "CVV",
		        "placeholder_payw_cardholder" :   "e.g. John E Cash",
		        "placeholder_payw_cardno" :   "---- ---- ---- ----",
		        "placeholder_payw_expmonth" :   "-- / --",
		        "placeholder_payw_expyear" :   "-- / --",
		        "placeholder_payw_cvv" :   "123",
		        "payw_confirmPayment"       :   "Button",
		        "payw_confirmPayment_btn"   :   "PAY NOW",
		        "waiting_icon"              :   "https://icon-library.com/images/waiting-icon-png/waiting-icon-png-19.jpg",
		    };
		    var payment_hooks = {
		        "merge_expiration"     :   "1",
		        "class_exp_cvv"        :   "half"
		    }
		</script>
		<script src="https://pay.ippeurope.com/pay.js?checkoutId=<?php echo $data_url; ?>&cryptogram=<?php echo $cryptogram; ?>"></script>
	</body>
</html>