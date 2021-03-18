<?php
include 'dbHandler.php';

//If post method has been submitted with name set to 'dbadd'
if(isset($_POST['dbadd'])){
    //Checks if there is connection to MySQL
    if($GLOBALS['conn']){
        $email = $_POST['dbadd'];
        //Checks if post contains anything
        if($email != ""){
            //Query for inserting new email to table, $email is value got from the post
            //Email is set to unique in table, so there can not be duplicates
            $query = "INSERT INTO submits (email) values ('$email')";
            mysqli_query($GLOBALS['conn'], $query);       
        }
    }
    //Directs browser to index.php
    header("Location: ../index.php");    
}

//If post method has been submitted with name set to 'erasedb'
if(isset($_POST['erasedb'])){
    //Checks if there is connection to MySQL
    if($GLOBALS['conn']){    
        //Query for deleting the mysql table and creating a new empty one
        mysqli_query($GLOBALS['conn'], "TRUNCATE TABLE submits;");
    }
    //Directs browser to index.php
    header("Location: ../index.php");    
}

//Echoes all emails from database
function getFromDB(){
    echo "<h4> Emails from database: </h4>";
    //Checks if there is connection to MySQL
    if($GLOBALS['conn']){
        //Query for fetching all the emails from table
        $result = mysqli_query($GLOBALS['conn'], "SELECT * FROM submits;");
        //Checks if there are any emails fetched
        $check = mysqli_num_rows($result);
        if($check > 0){
            echo "<ul>";
            //Echoes all the emails
            while($row = mysqli_fetch_assoc($result)){
                echo "<li>" . $row['email'] . "</li>" . "<br>";
            }
            echo "</ul>";
        }      
    } 
    else{
        echo "<h4> Not connected to MySQL server </h4>";
    }
}
