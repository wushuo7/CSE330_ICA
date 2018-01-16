<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
    <title>add A Story </title>
   <link rel="stylesheet" type="text/css" href="pet-style.css" />
     
        </style>
</head>

        <?php
        session_start();
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
        
       
        
        
        ?>
        <form name ="new" action = "submit-pet.php" method = "POST" enctype="multipart/form-data"><br>
        <p id=welcomewords2>Add new pet:</p><br>
        <p id=welcomewords2><input type= "text" name="petname"></p><br>
        <p id=welcomewords2>Username:</p><br>
        <p id=welcomewords2><input type= "text" name="username"></p><br>
        <label><input type="radio" name="species" value="fish" checked>fish</label>
        <label><input type="radio" name="species" value="dog">dog</label>
        <label><input type="radio" name="species" value="turtle">turtle</label>
        <label><input type="radio" name="species" value="pet rock">pet rock</label>
        <label><input type="radio" name="species" value="wolf">wolf</label>
        
        <p id=welcomewords2>Pet weight:</p><br>
        <p id=welcomewords2><input type="number" name="weight" min="0"></p><br>
        Description :<input type="textarea" name="description">
        File:<input type="file" name="picture">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>">
        <p id=welcomewords2><input type="submit" value="Submit" class="button"></p><br>
        </form>
        <blockquote>show all pets!<br>
                    <form action="show-pets.php" method="POST">
                    <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>" />
                    <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
                    <input type="submit" name="Back" value="Back"> 
                </form>
        
        
        </body>
        </html>