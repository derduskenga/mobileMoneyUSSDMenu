<?php
    require 'vendor/autoload.php';
    use AfricasTalking\SDK\AfricasTalking;

    include_once 'util.php';  
    class Sms {
        
        protected $AT;

        function __construct()
        {
            $this->AT = new AfricasTalking(Util::$API_USERNAME, Util::$API_KEY);
        }


        public function sendSms($message, $recipients){
            //get the sms service
            //$sms = $this->AT->sms();
            $sms = $this->AT->sms();
            //use the SMS service to send SMS
            $result = $sms->send([
                'to'      => $recipients,
                'message' => $message,
                'from'    => Util::$COMPANY_NAME
            ]);
            return $result;
        }
    }

?>