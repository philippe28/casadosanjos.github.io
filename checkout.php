<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
</head>
<body>
<?php
require_once("vendor/autoload.php");
require_once("lib/braintree.php"); 
require_once("lib/cart_session.php"); 


$cartSessionData = getCartSessionData();		
$total = $cartSessionData["total"];

$_POST["customer_firstname"] = "Earl";
$_POST["customer_lastname"] = "Jones";
$_POST["customer_phone"] = "555-1234";
$_POST["customer_email"] = "somefakeemail@cox.net";
$_POST["billing_postalcode"] = "88011";

$sale_array = array(
    "amount" => $total,    
    'customer' => array(
	    "firstName" => $_POST["customer_firstname"],
		"lastName" => $_POST["customer_lastname"],
		"phone" => $_POST["customer_phone"],
		"email" => $_POST["customer_email"],		
    	),
    	"billing" => array(
    	//"firstName" => $_POST["billing_firstname"],
		//"lastName" => $_POST["billing_lastname"],		
    	//"streetAddress" => $_POST["billing_street1"],
		//"extendedAddress" => $_POST["billing_street2"],
		//"locality" => $_POST["billing_city"],
		//"region" => $_POST["billing_state"],
		"postalCode" => $_POST["billing_postalcode"]
		),   
	"options" => array(
    	"submitForSettlement" => true
  	)
);

$sale_array["paymentMethodNonce"] = $_POST['payment_method_nonce'];

$result = Braintree_Transaction::sale($sale_array);

if ($result->success) {	
  // echo "<pre>" . print_r($result,true) . "</pre>";
  print_r("Success ID: " . $result->transaction->id); 
  // echo "<pre>" . print_r($result->transaction->customerDetails->email,true) . "</pre>"; 
} 
else 
{    
  echo "Failed! " . $result->message . "<br/>";  
}
?>
</body>
</html>
