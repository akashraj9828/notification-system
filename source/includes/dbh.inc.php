<?php 
/***** DATABASE HANDLER CONFIGURATION *****/


/*** USERNAME PASSWORD DATABASE ***/
$server="remote";
// $server="local";



if($server=="local")
{
        /** wamp config **/
        $dbServerName="localhost";
        $dbUserName="root";
        $dbPassword="";
        $dbName="test";
        $conn=mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);
}
else
{
        /** https://mysql8.db4free.net/phpMyAdmin config **/
        $dbServerName="db4free.net:3307";
        $dbUserName="akashraj98289";
        $dbPassword="idkmypassword";
        $dbName="test_db";
        $conn=mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);
}