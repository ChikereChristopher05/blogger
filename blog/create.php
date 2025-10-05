<?php
include_once ("config.php");

if(isset($_POST['submit'])){
    $post_title = get_post('post_title', $db);
   
    $post_content = get_post('post_content', $db);

 
    $db->query("INSERT INTO posts (post_title, post_content) VALUES ('$post_title', '$post_content') ");
    header("Location:dashboard.php");
}  
?>