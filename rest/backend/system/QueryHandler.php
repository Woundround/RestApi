<?php

class QueryHandler{

    static public function execute($query = NULL){
            
        if (!$query) {
           Logger::status(400);
          
           return;
        }
        
        $query = explode("/", $query);
        
        if (empty($query) || 4 > count($query)) {
            Logger::status(400);
            
            return;            
        }
        
     
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
                
                if(API_KEY !== $key){
                    Logger::status(403);
                    
                    return;
                }
                
                $class->$method($_POST);

            }else{
                Logger::status(405);
             }
            
            return;
        }

        Logger::status(405);
    }

    static public function log($log){}
    
}
