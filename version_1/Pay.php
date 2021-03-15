<?php


require_once("PayController.php");


$trade_id       = $_POST['trade_id'];
$totalAmount    = $_POST['total_amount'];
$tradeDesc      = $_POST['trade_description'];
ecPay::Pay($trade_id, $totalAmount, $tradeDesc);