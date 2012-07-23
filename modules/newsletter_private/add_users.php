<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
    <title>Add emails</title>
</head>
<body>
    <a href="index.php">Return to index page</a><br/>
    <br/>
    <form method='post' action=''>
        <textarea style="width: 300px; height: 100px;" name='emails_to_add' value='nothing'>Enter emails separated by a comma: example@hotmail.com, another@gmail.com</textarea>
        <input type="submit" value="Add" />
    </form>
    <?
        if (isset($_POST['emails_to_add']))
        {
            include('connect.php');
            $emails_to_add = explode(',', $_POST['emails_to_add']);
            foreach ($emails_to_add as $email)
            {
                $email=preg_replace('/\s/', '', $email);
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $email=strtolower($email);
                    $clean_email = explode('@', $email);
                    $clean_email[0] = preg_replace('/\./', '', $clean_email[0]);
                    $email=$clean_email[0].'@'.$clean_email[1];
                    $req = "INSERT INTO user (email) VALUES ('$email')";
                    if (mysql_query($req))
                        echo '<p><span style="color: green;">Added:</span> '.$email.'</p>';
                    else
                        echo '<p><span style="color: red;">Already entered: '.$email.'</span></p>';
                }
                else
                    echo '<p><span style="color: red;">Not valid:</span> '.$email.'</p>';
            }
            include('deconnect.php');
        }
    ?>
</body>
</html>
