<?php

class Logger{

    public static function message($message = NULL){
        
        if (!$message) {
            echo null;
        }

        echo json_encode($message);

    }

    public static function status($code){

        $message = array(
            400 => "Your request is bad, read the documentation https://dev.flik.ru/requestes",
            403 => "Forbidden",
            405 => "Method Not Allowed, read the documentation https://dev.flik.ru/classes_and_methods",
        );

        if(isset($message[$code])){

            self::message(array(
                "status" => $code,
                "message" => $message[$code],
            ));

            http_response_code($code);    
            
            return;        
        }

        if (isset($message[400]) {
            echo $message[400];
          
            return;
        }

       http_response_code(500);
    }

}
