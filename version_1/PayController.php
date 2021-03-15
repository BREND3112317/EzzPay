<?php


include("../sdk/ECPay.Payment.Integration.php");


class ecPay {


    protected static $Service_url     = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";
    protected static $Hash_Key        = "5294y06JbISpM5x9";
    protected static $Hash_IV         = "v77hoKGq4kWxNNIS";
    protected static $Merchant_ID     = "2000132";
    protected static $Encrypt_Type    = "1";


    public static function Pay($TrandeNo, $TotalAmount, $TradeDesc, $opt = array()) {
        // $TrandeNo    訂單號碼
        // $TotalAmount 訂單金額
        // $TrandeDesc  訂單說明
        // $opt
        try {
            $pay = new ECPay_AllInOne();
   
            //服務參數
            $pay->ServiceURL  = self::$Service_url;
            $pay->HashKey     = self::$Hash_Key;
            $pay->HashIV      = self::$Hash_IV;
            $pay->MerchantID  = self::$Merchant_ID;
            $pay->EncryptType = self::$Encrypt_Type;

            $pay->Send['ReturnURL']         = "https://google.com";
            $pay->Send['MerchantTradeNo']   = $TrandeNo;
            $pay->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');  
            $pay->Send['TotalAmount']       = $TotalAmount;
            $pay->Send['TradeDesc']         = $TradeDesc;
            $pay->Send['ChoosePayment']     = ECPay_PaymentMethod::ALL;
    
            array_push($pay->Send['Items'], array('Name' => "歐付寶黑芝麻豆漿", 'Price' => (int)"2000",
                       'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "dedwed"));
            $pay->CheckOut();
        } catch (\Exception $e) {
            throw $e;
        }
    } 
}