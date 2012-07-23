<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
    <title>Subscribe</title>
</head>
<body>
<?php
if (isset($_POST['email']) && isset($_POST['validate']))
    {
        include('../newsletter/connect.php');
        $email=preg_replace('/\s/', '', $_POST['email']);
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $email=strtolower($email);
            $clean_email = explode('@', $email);
            $clean_email[0] = preg_replace('/\./', '', $clean_email[0]);
            $email=$clean_email[0].'@'.$clean_email[1];
            
            $req = 'SELECT * FROM user WHERE email="'.$email.'"';
            $data = mysql_query($req) or die("Error: " . mysql_error());
            if (mysql_numrows($data))
            {
                $user = mysql_fetch_assoc($data);
                if ($user['unsubscribe'])
                {
                    $req = 'UPDATE user SET unsubscribe=0 WHERE id='.$user['id'];
                    mysql_query($req) or die("Error: " . mysql_error());
                    $subscribe_message='<p><span style="color: green;">Thank you ! email added: </span> '.$email.'</p>';
                }
                else
                    $subscribe_message='<p><span style="color: red;">You are already on our list, thank you: </span>'.$email.'</p>';
            }
            else
            {
                $req = "INSERT INTO user (email) VALUES ('$email')";
                mysql_query($req) or die("Error: " . mysql_error());
                $subscribe_message='<p><span style="color: green;">Thank you ! email added: </span> '.$email.'</p>';
            }
        }
        else
            $subscribe_message='<p><span style="color: red;">This e-mail is not valid:</span> '.$email.'</p>';
        include('../newsletter/deconnect.php');
    }

    $value = '';
    if (isset($_GET['email']))
        $value = $_GET['email'];
    echo '<p>Enter a valid email to subscribe to our newsletter</p>';
    $form = '<form method="post" action="?">';
    $form .= '<input style="width: 200px;" type="text" name="email" value="'.$value.'" />';
    $form .= '<input type="hidden" name="validate" value="1" />';
    $form .= '<input type="submit" value="Subscribe" />';
    $form .= '</form>';
    echo $form;
    echo '<br/>';
    if (isset($subscribe_message))
        echo $subscribe_message;
 
?>
</body>
</html>
