<?php
    //Start session
    session_start();
    
    //checking connection and connecting to a database
    require_once('connection/config.php');
    //Connect to mysql server
    $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if(!$link) {
        die('Failed to connect to server: ' . mysql_error());
    }
    
    //Select database
    $db = mysql_select_db(DB_DATABASE);
    if(!$db) {
        die("Unable to select database");
    }
 
     // check if the 'id' variable is set in URL
     if (isset($_GET['id']))
     {
         // get id value
         $id = $_GET['id'];
         
         // delete the entry

         $result = mysql_query("DELETE FROM food_details WHERE food_id='$id'")
         or die("There was a problem while removing the food ... \n" . mysql_error()); 
         
         // redirect back to the foods page
         $result1 = mysql_query(" UPDATE countz set cont=cont-1");
         header("Location: foods.php");
         }
     else
     // if id isn't set, redirect back to the foods page
     {
        header("Location: foods.php");
     }
 
?>