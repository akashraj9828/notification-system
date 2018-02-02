<?php

if ( isset( $_POST[ 'upload_post' ] ) ) {
    if(isset($_SESSION['u_uid'])){
    include_once 'dbh.inc.php';
    
    $username = $_SESSION['u_uid'];
    $firstname =$_SESSION[ 'u_first'] ;
    $lastname=$_SESSION[ 'u_last' ];
    $post_data = mysqli_real_escape_string( $conn, $_POST[ 'post_data' ] );
    $sql="INSERT INTO `posts` (user_uid,user_first,user_last,post_data) VALUES ('$username','$firstname','$lastname','$post_data')";



    if(mysqli_query($conn, $sql)){
        header("Location: ?post_upload=success");
        exit();
     }
     else{
            //print any error if connection fails
            echo "Error: " . $sql . "<br>" . mysqli_error($conn). '<br>';
        }


    }else {
        echo '<h2> You are not logged in.. :( </h2>';
    }
}
if ( isset( $_POST[ 'upload_comment' ] ) ) {
    if(isset($_SESSION['u_uid'])){
    include_once 'dbh.inc.php';
    
    $username = $_SESSION['u_uid'];
    $firstname =$_SESSION[ 'u_first'] ;
    $lastname=$_SESSION[ 'u_last' ];
    $post_id =$_POST[ 'post_id' ];
    $post_by_uid =$_POST[ 'post_by_uid' ];
    $comment_data = mysqli_real_escape_string( $conn, $_POST['comment_data'] );
    
    $sql="INSERT INTO `comments` (post_id,posted_by_uid,comment_user_uid,comment_user_first,comment_user_last,comment_data) VALUES ('$post_id','$post_by_uid','$username','$firstname','$lastname','$comment_data')";



    if(mysqli_query($conn, $sql)){
        header("Location: ?post_upload=success");
        exit();
     }
     else{
            //print any error if connection fails
            echo "Error: " . $sql . "<br>" . mysqli_error($conn). '<br>';
        }

    }else {
        echo '<h2> You are not logged in.. :( </h2>';
    }
}
