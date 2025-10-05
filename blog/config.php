<?php
session_start();
$db = new mysqli("phpso9.h.filess.io", "blog_directfun", "5621b1d2b0732f6053bebebd75c88bd0e0dee95f", "blog_directfun");


function get_post($field = "", $db){
    if(isset($_POST[$field])){
        return mysqli_real_escape_string($db, trim(strip_tags($_POST[$field])));
    }else{
        return "";
    }
}

function set_alert($msg ="", $type ="danger"){
   $_SESSION['alert_msg']= $msg;
   $_SESSION['alert_type']= $type;
}

function get_alert(){
       if(isset($_SESSION['alert_msg'])){
    ?>
        
        <div class="alert alert-<?=$_SESSION['alert_type']?> alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <?=$_SESSION['alert_msg']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"  aria-label="Close"></button>
        </div>
    <?php
    $_SESSION['alert_msg']="";
    $_SESSION['alert_type']="";
    }
}



function kick($db, $kick = 1){
    if($kick == 1){
        if(isset($_SESSION['uid'])){
            $uid = $_SESSION['uid'];
            $user = $db->query("SELECT * FROM users WHERE uid = $uid");
            if($user->num_rows > 0){
                $user = $user->fetch_assoc();
                return $user;
            }else{
                die(header("Location:index.php"));
            }
        }else{
            die(header("Location:index.php"));
        }
    }else{
         if(isset($_SESSION['uid'])){
            $uid = $_SESSION['uid'];
            $user = $db->query("SELECT * FROM users WHERE uid = $uid");
            if($user->num_rows > 0){
                $user = $user->fetch_assoc();
                return $user;
            }
        }
    }
}
?>