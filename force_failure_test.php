<?php
class IPPGateway {

    private $company_id;
    private $company_key2;

    function __construct($id,$key) {
        $this->company_id = $id;
        $this->company_key2 = $key;
    }

    public function checkout_id($data){
        return $this->curl("https://api.ippworldwide.com/payments/checkout_id", "POST", [], $data)->content;
    }
    public function payment_status($transaction_id,$transaction_key){
        $data = ["transaction_id" => $transaction_id, "transaction_key" => $transaction_key];
        return $this->curl("https://api.ippworldwide.com/payments/status", "POST", [], $data)->content;
    }
    public function request($url, $data){
        return $this->curl("https://api.ippworldwide.com/".$url, "POST", [], $data);
    }
    private function curl($url, $type = 'POST', $query = [], $data = [], $headers = []){
        $data["id"] = $this->company_id;
        $data["key2"] = $this->company_key2;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$url.php?".http_build_query($query, "", "&", PHP_QUERY_RFC3986));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
        if($type == "POST") {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if (is_array($headers) && sizeof($headers) > 0) {
            curl_setopt($ch, CURLOPT_HEADER, $headers);
            curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        }
        $server_output = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($server_output);
        if (json_last_error() == JSON_ERROR_NONE) {
            return $json;
        }
        return $json;
    }
}

header("Strict-Transport-Security: max-age=16070400");
header("X-Frame-Options: SAMEORIGIN");
header("X-XSS-Protection: 1; mode=block");
header('X-Content-Type-Options: nosniff');

$ipp = new IPPGateway("CUSTOMER-ID","CUSTOMER-KEY-2");


$data   = [];
$data["currency"] = "USD";
$data["amount"] = 800;
$data["order_id"] = 123;
$data["transaction_type"] = "ECOM";
$data["ipn"] = "https://www.google.dk";


$data = $ipp->checkout_id($data);


$data_url = $data->checkout_id;
$cryptogram = $data->cryptogram;
$action = "success.php";
?>
<script>
    var payment_settings = {
        "payw_cardholder"           :   "Kortholder",
        "payw_cardno"               :   "Kortnummer",
        "payw_expmonth"             :   "Udløbsmåned",
        "payw_expyear"              :   "Udløbsår",
        "payw_cvv"                  :   "CVV",
        "payw_confirmPayment"       :   "Knap",
        "payw_confirmPayment_btn"   :   "Gennemfør"
    };
</script>
<script src="https://pay.ippworldwide.com/pay.js?checkoutId=<?php echo $data_url; ?>&cryptogram=<?php echo $cryptogram; ?>"></script>
<form action="#" class="search-form paymentWidgets" data-brands="VISA MASTER" data-theme="divs"></form>
<br />
Checkout data contains the currency ISO, which we do not allow in our testing environment.
<br />
Testing Card: 5200 0000 0000 1005<br />All other fields is free of choice.

<style>
    .paymentWidgets .PaymentFields {
        background: #FFF;
        width: 400px;
    }
    .paymentWidgets .PaymentFields div {
        position: relative;
        float: left;
        width: 200px;
    }
</style>
