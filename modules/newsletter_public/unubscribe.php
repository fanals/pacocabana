<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
    <title>Unsubscribe</title>
</head>
<body>
    <?php
        if (isset($_GET['id']) && isset($_GET['email']) && is_numeric($_GET['id']))
        {
            include('../newsletter/connect.php');
            $req = 'SELECT * FROM user WHERE id='.$_GET['id'];
            $data = mysql_query($req);
            if (mysql_numrows($data))
            {
                $user = mysql_fetch_assoc($data);
                if ($user['email'] == $_GET['email'] && $user['unsubscribe'] == 0)
                {
                    echo '<p>Are you sure you want to unsubscribe from our newsletter ?</p>';
                    echo '<br/>';
                    $form = '<form method="post" action="?">';
                    $form .= '<input type="hidden" name="id" value="'.$user['id'].'" />';
                    $form .= '<input type="hidden" name="email" value="'.$user['email'].'" />';
                    $form .= '<input type="hidden" name="validate" value="1" />';
                    $form .= '<input type="submit" value="Yes, unsubscribe" />';
                    $form .= '</form>';
                    echo $form;
                }
                else
                    header('Location: ../index.php');
            }
            else
                header('Location: ../index.php');
            include('../newsletter/deconnect.php');
        }
        else if (isset($_POST['id']) && isset($_POST['email']) && is_numeric($_POST['id']) && isset($_POST['validate']))
        {
            include('../newsletter/connect.php');
            $req = 'SELECT * FROM user WHERE id='.$_POST['id'];
            $data = mysql_query($req);
            if (mysql_numrows($data))
            {
                $user = mysql_fetch_assoc($data);
                if ($user['email'] == $_POST['email'])
                {
                    $req = 'UPDATE user SET unsubscribe=1 WHERE id='.$_POST['id'];
                    mysql_query($req);
                    echo '<p>You will not receive our newsletter anymore, bye</p>';
                    echo '<p>If you didn\'t want to, you can subscribe again at <a href="../newsletter_subscribe/?email='.$user['email'].'">'.$_SERVER['SERVER_NAME'].'/newsletter_subscribe/</a></p>';
                }
                else
                    header('Location: ../index.php');
            }
            else
                header('Location: ../index.php');
            include('../newsletter/deconnect.php');
        }
        else
        {
            header('Location: ../index.php');
        }
    ?>
</body>
</html>
