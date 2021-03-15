<?php


require_once("PayController.php");


$trade_id       = "testOrder" . time();
$totalAmount    = 100;
$tradeDesc      = "test";
ecPay::Pay($trade_id, $totalAmount, $tradeDesc);