<?php
$pf = Array();
$pf["action"] = "getclients";

$w = new Whmcs( "fale", "c00f9dbd" );
print_r( $w->action( $pf ) );
?>
