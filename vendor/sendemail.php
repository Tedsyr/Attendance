<?php

require 'vendor/autoload.php';

class sendemail{

    public static function sendemail($to , $subject , $content){
        $key = ';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';

        $email = new \SendGrid\Mail\Mail();
        $email->setfrom("tedtech@hotmail.com","Tedroy Williams");
        $email->setsubject($subject);
        $email->addto($to);
        $email->addcontent("text/plain",$content);


        $sendgrid = new \SendGrid($key);

        try{
            $response = $sendgrid->send($email);
            return $response;
        }catch(Exception $e){
   echo 'Email Exception Caught :'. $e->GetMessage() ."\n";
                return false;

        }
    }
}

?>