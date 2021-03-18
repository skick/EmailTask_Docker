<?php
$file = 'emails.txt';

//If post method has been submitted with name set to 'addfile'
if(isset($_POST['addfile'])){
    $txt = $_POST['addfile'];
    //Checks if post contains anything
    if($txt != ""){
        $emailfile = fopen($GLOBALS['file'], "a") or die("Unable to open file.");
        //Tests if email is already in file
        $test = false;
        $lines = file($GLOBALS['file']);    
        foreach($lines as $line) {
            //strcasecmp returns 0 if strings are same
            if(strcasecmp($txt . "\n", $line) == 0){
                //sets $test to true if the same email is already in file
                $test = true;
                break;
            }
        }
        //Writes the email to file only if it has not been submitted already
        if(!$test){
           fwrite($emailfile, $txt . "\n");
           fclose($emailfile);    
        }        
    }
    //Redirects browser to index.php
    header("Location: ../index.php");   

} 

//If post method has been submitted with name set to 'erasefile'
if(isset($_POST['erasefile'])){
    //Opens the file and empties it
    if ($file = fopen($GLOBALS['file'], "w")) {    
        ftruncate($file, 0);
        fclose($GLOBALS['file']);
    }
    //Redirects browser to index.php
    header("Location: ../index.php");
}



//Echoes all the emails from .txt file
function getFromFile(){
    echo "<h4> Emails from file: </h4>";
    //Checks if there is a file
    if(file_exists("includes/".$GLOBALS['file'])){
        //Reads file to an array
        $lines = file("includes/".$GLOBALS['file']);
        echo "<ul>";
        //Echoes all the elements from array
        foreach($lines as $line) {
            echo "<li>" . $line . "</li>" . "<br>";
        }
        echo "</ul>";
    }
}
