<?php

class Logger{

    public static function message($message = NULL){

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
        
        }else{

            echo $message[400];

        }

    }

}