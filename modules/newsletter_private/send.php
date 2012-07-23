<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
    <title>Send NewsLetter</title>
    <style type="text/css">
            h2, th, td
            {
                text-align:center;
            }
            table
            {
                border-collapse:collapse;
                border:2px solid white;
                margin:auto;
            }
            th, td
            {
                border:1px solid black;
            }
        </style>
</head>
<body>
    <?
    include('connect.php');
    include('constant.php');
    if (!isset($_GET['news']) || !is_numeric($_GET['news']))
    {
        header('Location: index.php');
        include('deconnect.php');
    }
    $req = 'SELECT * FROM newsletter WHERE id='.$_GET['news'];
    $data = mysql_query($req) or die("Error: " . mysql_error());
    if (!mysql_numrows($data))
    {
        header('Location: index.php');
        include('deconnect.php');
    }
    $news = mysql_fetch_assoc($data);
    $html_message = NEWS_DIRECTORY.$news['id'].'.html';
    if (isset($_POST['email_test']))
    {
        $email_to_send = $_POST['email_test'];
        if (!$news['object'])
            $error['no_obj'] = '<span style="color: red;">You need to set an object</span>';
        if (!file_exists($html_message))
            $error['no_html_news'] = '<span style="color: red;">Upload a newsletter to send</span>';
        if (!isset($error))
        {
            include(SWIFT);
            $html_file = file_get_contents($html_message);
            $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com',465,'ssl')->setUsername(GMAIL_MAIL)->setPassword(GMAIL_MAIL_PASSWORD);
            $mailer = Swift_Mailer::newInstance($transport);
            $message = Swift_Message::newInstance('Le Paco ouvre ses portes')
            ->setContentType("text/html")
            ->setFrom(array(GMAIL_MAIL => 'Paco cabana'))
            ->setTo(array($email_to_send => 'Seb'))
            ->setBody($html_file)
            ;
            if ($mailer->send($message))
                $mail_message = '<span style="color: green;">Mail sent !</span>';
            else
                $error['mail_not_sent'] = '<span style="color: red;">Mail not sent</span>';
        }
    }
    
    ?>
<p align=center><font size="6"><font color="red">Send newsletter</font></font></p>
 
<a href="index.php">Return to index page</a><br/><br/>
<a href="manage_newsletter.php?news=<? echo $_GET['news'] ?>">Back to newsletter editing</a><br/><br/>

<h3>You're about to send: <? echo $news['name'] ?></h3>

<p>Mail object: <? echo $news['object'] ?> <? echo $error['no_obj'] ?></p>

<p>Preview: <? echo $error['no_html_news'] ?></p>
<? if (file_exists($html_message)) {include($html_message);} ?>
<br/><br/>
<form style="width: 1000px;" method="post" action="" >
Send a test to this e-mail: <input style="width: 200px;" type="text" name="email_test" value="sebastienfanals@gmail.com" />
<input type="submit" name="" value="Send" onclick="return confirm('Are you sure ?');" />
<? echo $error['mail_not_sent'] ?>
<? echo $mail_message ?>
</form>
<br/><br/>
<?

$req = 'SELECT * FROM user_newsletter WHERE newsletter_id='.$news['id'];
$data = mysql_query($req) or die('Error: '.mysql_error());
$sent_to_nb = mysql_numrows($data);
    
if ($news['sent_to_all'] == 0)
{
    $req = 'SELECT * FROM `user` WHERE unsubscribe=0';
    $data = mysql_query($req) or die('Error: '.mysql_error());
    $nb_subscribers = mysql_numrows($data);
    
    $form = '<form method="post" action="sending.php" >';
    $form .= 'Send to everybody ! ('.$nb_subscribers.' subscribers) <br/>';
    $form .= '<input type="hidden" name="news" value="'.$news['id'].'" />';
    $form .= '<input type="submit" name="submit" value="Send" onclick="return confirm(\'Are you sure ?\');" />';
    $form .= '</form>';
    echo $form;
    if ($sent_to_nb)
    {
        echo '<p>This newsletter has been sent to '.$sent_to_nb.' out of '.$nb_subscribers.' persons</p>';
    }
    else
    {
        echo '<p>Not sent yet</p>';
    }
}
else
{
    echo '<p>This newsletter has already been sent to everyone ('.$sent_to_nb.' emails)</p>';
}
?>
</body>
</html>
