<?php

class QueryHandler{

    static public function execute($query = NULL){

        $query = explode("/", $query);
        
        if(count($query) >= 4){

            $type = $query[0];
            $class = $query[1];
            $method = $query[2];
            $key = $query[3];

            if($type == "admin"){

                self::log(array(
                    "type" => $type,
                    "class" => $class,
                    "method" => $method,
                    "key" => $key,
                ));
    
            }

            if(class_exists($class)){

                $class = new $class;
                $class->query = $query;
                if(method_exists($class, $method)){

                    if(API_KEY == $key){
                            
                        $class->$method($_POST);

                    }else{

                        Logger::status(403);

                    }

                }else{

                    Logger::status(405);

                }

            }else{

                Logger::status(405);

            }

        }else{

            Logger::status(400);
            
        }
        
    }

    static public function log($log){}
    
}