<?php

include_once "../backend/load.php";

if(isset($_GET["query"])){

    QueryHandler::execute($_GET["query"]);

}else{

    Logger::status(400);

}