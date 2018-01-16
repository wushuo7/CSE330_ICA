<?php
    session_start();
    $username = $_SESSION['username'];
    if( !preg_match('/^[\w_\-]+$/', $username) ){
            echo "Invalid username";
            exit;
     }
     $filename=$_POST["openFiles"];
    if( !preg_match('/^[\w_\.\-]+$/', $filename) ){
        echo "Invalid filename";
        exit;
    }

    $path = "/home/wushuo/public_html/new/".$filename;
    $pathofthefile = "/~wushuo/new/".$filename;
    $fileinfo = pathinfo($path);
    printf("<img class = \"displayed\" src = \"%s\" >",$pathofthefile);

    
?>