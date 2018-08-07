

<?php 

if(!isset($_SESSION)){ 
    session_start();
    $_SESSION["nombreUser"]=NULL;
         //$_SESSION["cel"]=$celular;
    $_SESSION["email"]=NULL;
    unset($_SESSION["nombreUser"]);
    //$_SESSION["cel"]=$celular;
    unset($_SESSION["email"]);
    setcookie("cookieUserEmail","",time()*30*24*60*60,"/");
    setcookie("cookieUserNombre","",time()*30*24*60*60,"/");
    session_destroy();
    header("location:index.php");
    //echo "<script type='text/javascript'>window.location.href = 'index.php';</script>"
    exit;
}
?>
