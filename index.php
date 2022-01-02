<?php
header("Strict-Transport-Security: max-age=16070400");
header("X-Frame-Options: SAMEORIGIN");
header("X-XSS-Protection: 1; mode=block");
header('X-Content-Type-Options: nosniff');

$data_url = $_GET["checkout_id"];
$cryptogram = $_GET["cryptogram"];
$action = isset($_GET["action"]) ? urldecode($_GET["action"]) : "success.php";
?>
<html>

<head></head>
<body>

<script src="https://pay.ippworldwide.com/pay.js?checkoutId=<?php echo $data_url; ?>&cryptogram=<?php echo $cryptogram; ?>"></script>
<form action="#" class="paymentWidgets" data-brands="VISA MASTER" data-theme="supah"></form>

</body>

</html>
