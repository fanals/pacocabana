<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
    <title>Create newsletter</title>
</head>
<body>
    <a href="index.php">Return to index page</a><br/>
    <br/>
    <form method="post" action="">
        <h3>Creating a Newsletter</h3>
        <input style="width: 250px;" type="text" name="newsletter_name" value="Name of the Newsletter"/>
        <input type="submit" value="Create" />
    </form>
    <?
        if (isset($_POST['newsletter_name']))
        {
            include('connect.php');
            $name = htmlspecialchars($_POST['newsletter_name']);
            $req = "INSERT INTO newsletter (name) VALUES ('$name')";
            if (mysql_query($req))
            {   
                $manage = '<a href="manage_newsletter.php?news='.mysql_insert_id().'">Manage it ?</a>';
                echo '<p><span style="color: green;">Created: </span>'.$name.' '.$manage.'</p>';
            }
            else
                echo '<p><span style="color: red;">Already created: </span>'.$name.'</p>';
            include('deconnect.php');
        }
    ?>
</body>
</html>
