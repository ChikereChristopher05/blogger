<?php
include_once ("config.php");

$error = 0;
$error_msg = "";
if(isset($_POST['submit'])){
    $emailaddress = get_post('emailaddress', $db);
   
    $password = get_post('password', $db);

    if($emailaddress == "" || $password == "" ){
        $error = 1;
        $error_msg .= "Please fill in your credentials <br>";
    }

 
    $check = $db->query("SELECT * FROM users WHERE emailaddress = '$emailaddress' ");
    if($check->num_rows > 0){
        $check = $check->fetch_assoc();
        $uid = $check['uid'];
    }

    if($error == 0){
        $_SESSION['uid'] = $uid;
        header("Location:dashboard.php");
    }else{
        set_alert($error_msg, "danger");
        header("Location:index.php");
    }

}  
?>