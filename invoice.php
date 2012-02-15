<?php
$pf = Array();
$pf["action"] = "createinvoice";
$pf["userid"] = "1";
$pf["date"] = "20120101";
$pf["duedate"] = "20120115";
$pf["paymentmethod"] = "paypal";
$pf["sendinvoice"] = true;
$pf["itemdescription1"] = "Test Line Item 1";
$pf["itemamount1"] = "10.00";
$pf["itemtaxed1"] = 1;
$pf["itemdescription2"] = "Test Line Item 2";
$pf["itemamount2"] = "20.00";
$pf["itemtaxed2"] = 0;

$w = new Whmcs( "fale", "c00f9dbd" );
print_r( $w->action( $pf ) );
?>
