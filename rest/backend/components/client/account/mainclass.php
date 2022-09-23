<?php

include_once "traites/auth.php";
include_once "traites/settings.php";

class Account{

    use AccountTraitAuth, AccountTraitSettings;
    public function __construct(){}

}