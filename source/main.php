<?php

if(!isset($_SESSION['u_id'])){
    include_once "login.php";
}
else
{
    include_once "content.php";
}