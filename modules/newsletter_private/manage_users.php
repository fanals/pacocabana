<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
    <title>Manage users</title>
</head>
<body>
    <a href="index.php">Return to index page</a><br/>
    <br/>
    <?
        include('connect.php');
        if (isset($_POST['email_id']) && is_numeric($_POST['email_id']))
        {
            $req = 'DELETE FROM `user` WHERE id='.$_POST['email_id'];
            mysql_query($req) or die("Error: " . mysql_error());
        }
        $req = 'SELECT * FROM  `user`';
        $data = mysql_query($req) or die("Error: " . mysql_error());
        echo '<p>There is <strong>'.mysql_numrows($data).'</strong> client(s) in the database</p>';
        while ($email=mysql_fetch_assoc($data))
        {
            if ($email['unsubscribe'])
                $sub = '<span style=\'color: red;\'>Unsubscribed</span>';
            else
                $sub = '<span style=\'color: green\'>Subscribes</span>';
            $form = '<form style="display: inline;" method="post" action="">';
            $form .= '<input type="hidden" name="email_id" value="'.$email['id'].'"/>';
            $form .= '<input onclick="return confirm(\'Are you sure ?\');" type="submit" value="Delete" />';
            $form .= '</form>';
            echo '<div>'.$sub.' : '.$email['email'].' '.$form.'</div>';
        }
        include('deconnect.php');
    ?>
</body>
</html>
