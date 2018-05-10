<?php

//session start in sever side
session_start();

//Create CSRF Token key
if(empty($_SESSION['key']))
{
    $_SESSION['key']=bin2hex(random_bytes(32));
    
}

//Genarate CSRF Token
$token = hash_hmac('sha256',"This is token:index.php",$_SESSION['key']);

//store CSRF token in session variable
$_SESSION['CSRF'] = $token; 

ob_start(); 

echo $token;


if(isset($_POST['submit']))
{
    ob_end_clean(); 
    
    
    loginvalidate($_POST['CSR'],$_COOKIE['session_id'],$_POST['user_name'],$_POST['user_pswd']);

}


function loginvalidate($user_CSRF,$user_sessionID, $username, $password)
{
    if($username=="admin@admin.com" && $password=="admin123" && $user_CSRF==$_SESSION['CSRF'] && $user_sessionID==session_id())
    {
	header( "Location:other/success.html" );
        apc_delete('CSRF_token');
    }
    else
    {
	header( "Location:other/error.html" ); 
    }
}

?>
