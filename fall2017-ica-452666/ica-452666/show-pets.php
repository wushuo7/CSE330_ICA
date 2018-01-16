<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <title>Story </title>
    <link rel="stylesheet" type="text/css" href="pet-style.css" />
    </style>
</head>

<body>
    <div id="welcome">

    <p id=welcomewords>Welcome to the <del>worst</del> <ins>Best</ins> Pet Website</p>

    </div>
<?php
    require 'database.php';
    session_start();
        
        if(!hash_equals($_SESSION['token'], $_POST['token'])){
                echo $_SESSION['token'];
                echo $_POST['token'];
                    die("Request forgery detected");
            }
        
       

        $username=$_SESSION['username'];
        echo "<p id =welcomewords3>Logged in as: $username</p></br>";
       
        $stmt = $mysqli->prepare("select id, username, species, name,filename, weight, description from pets");
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        
    $stmt->execute();
    echo'<ul>';
    $stmt->bind_result($id ,$user, $species,$name,$filename,$weight,$description);
  
    while($stmt->fetch()){
        printf("<p id=title>Pet Name: %s</p>",htmlspecialchars($name));
        printf("<p id=welcomewords2>Owner: %s</p>",htmlspecialchars($user));
        printf("<p id=welcomewords2>ID: %s</p>",htmlspecialchars($id));
        
        printf("<p id=welcomewords2>Species: %s</p>",htmlspecialchars($species));
        printf("<p id=welcomewords2>Weight: %s</p>",htmlspecialchars($weight));
        printf("<p id=welcomewords2>Description: %s</p>",htmlspecialchars($description));
        $link = sprintf("open-image.php?id=%u", $id);
        echo '<form name="img" action="'.$link.'" method = "POST">';
        echo '<input type="hidden" name="token" value="'.$_SESSION['token'].'" />';
        echo '<input type="hidden" name="openFiles" value="'.$filename.'" />';
        echo '<p id=welcomewords4 ><input type="submit" name="create" value="View the Pet Picture"></p>';
        echo '</form>';
        
        
        
    }
    

    $stmt->close();
    
    
?>
    
    
        <blockquote>
            <br>add Your own pet!<br>
            <form action="new-pet.php" method="POST">
            <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
            <input type="submit" name="addstory" value="SHARE">
            
        </form>
            <br>
            
            
        </blockquote>
        
    </div>
</body>
</html>