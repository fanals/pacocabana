<?
function add_users_to_user_newsletter_table($news)
{
    $news_id = $news['id'];
    $req = 'SELECT * FROM `user` WHERE unsubscribe=0';
    $data = mysql_query($req) or die("Error: " . mysql_error());
    
    $req = 'INSERT INTO `user_newsletter` VALUES ';
    $flag_first = 1;
    while ($user = mysql_fetch_assoc($data))
    {
        if (!$flag_first)
            $req .= ',';
        $flag_first = 0;
        $user_id = $user['id'];
        $req .= "(NULL, '$user_id', '$news_id', '0', '0', '')";
    }
    $req .= ';';
    if ($flag_first)
        return;
    mysql_query($req) or die("Error: " . mysql_error());
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
    <title>Sending !</title>
</head>
<body>
    <h3 style="text-align: center;">Sending !</h3>
    <p>Don't close this page if you wan't to continue to send.<br/>
    But you can close it and continue it later, it will not send twice to the same e-mail.
    </p>
    <br/>
    <?
        if (isset($_POST['news']))
        {
            include('connect.php');
            include('constant.php');
            $req = 'SELECT * FROM `newsletter` WHERE id='.$_POST['news'];
            $data = mysql_query($req) or die("Error: " . mysql_error());
            if (mysql_numrows($data))
            {
                $news = mysql_fetch_assoc($data);
                if ($news['sent_to_all'])
                    $error['already_sent'] = 'This newsletter has already been sent to everybody';
                else
                {
                    $req = 'SELECT * FROM `user_newsletter` WHERE newsletter_id='.$news['id'];
                    $data = mysql_query($req) or die("Error: " . mysql_error());
                    if (!mysql_numrows($data))
                        $data = mysql_query($req) or die("Error: " . mysql_error());
                    $req = 'SELECT email FROM `user_newsletter`';
                    $req .= ' LEFT JOIN `user` ON `user`.id=`user_newsletter`.user_id';
                    $req .= ' WHERE `user_newsletter`.newsletter_id='.$news['id'];
                    $req .= ' AND `user`.unsubscribe = 0';
                    $req .= ' AND sent = 0';
                    $data = mysql_query($req) or die("Error: " . mysql_error());
                    while ($user = mysql_fetch_assoc($data))
                    {
                        echo 'Sent to: '.$user['email'];
                        echo '</br>';
                    }
                }
            }
            else
            {
                include('deconnect.php');
                header('Location: index.php');
            }
            include('deconnect.php');
        }
        else
        {
            header('Location: index.php');
        }
    ?>
<p style="color: red"><? echo $error['already_sent'] ?></p>
</body>
</html>
