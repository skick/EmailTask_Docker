<!DOCTYPE html>
<?php
    include 'includes/dbActions.php';
    include 'includes/dbHandler.php';
    include 'includes/fileActions.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Email collector</title>
        <link rel="stylesheet" type="text/css" href="includes/style.css">
    </head>
    <body>
        <header class="main-header">
        <h3>Email collector</h3>
        </header>
        <div class="container">
            <div class="emailList">
                <form action="includes/dbActions.php" method="POST">
                    <input type="email" name="dbadd" placeholder="Add to database">
                    <button type="submit" name="submit">SUBMIT</button>
                </form>
                <div class="itemList">
                    <?php
                        //fetches emails from getFromDB() function in dbActions.php
                        getFromDB();
                    ?>
                </div>
                <form action="includes/dbActions.php" method="POST">
                    <button type="submit" name="erasedb">EMPTY DATABASE</button>
                </form>
            </div>
            <div class="emailList">
                <form action="includes/fileActions.php" method="POST">
                    <input type="email" name="addfile" placeholder="Add to file">
                    <button type="submit" name="submit">SUBMIT</button>
                </form>
                <div class="itemList">
                    <?php
                        //fetches emails from getFromFile() function in fileActions.php
                        getFromFile();
                    ?>
                </div>
                <form action=includes/fileActions.php method="POST"> 
                    <input type="submit" name="erasefile"
                        class="button" value="EMPTY FILE" /> 
                </form>
            </div>
        </div>
    </body>
</html>
