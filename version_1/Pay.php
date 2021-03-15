<?php


require_once("PayController.php");


$trade_id = "testOrder" . time();
$totalAmount = 100;
$trandeDesc = "test";
ecPay::Pay($trade_id, $totalAmount, $trandeDesc);