<?php
include("confirmed-payment.php");

var_dump($ipp->payment_status($_GET["transaction_id"],$_GET["transaction_key"]));
