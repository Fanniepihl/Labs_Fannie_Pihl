<?php

#http script
ini_set('session.cookie_httponly', true);



session_start ();

if (isset($_SESSION['userip']) === false){
    
    #if (den ovan) it´s not set you set it here.
    #here we store the IP into the session 'userip'  (store thie information about the IP sessin/user ip)
    $_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];
}

#IP of the current user . is it true continue, 
#if this is not true to the server we wanna destroy the session. unset then destroy.

if ($_SESSION['userip'] !== $_SERVER['REMOTE_ADDR']){
    session_unset();
    session_destroy();
    
}






