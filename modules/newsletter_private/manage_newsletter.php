<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
    <title>Manage newsletters</title>
</head>
<body>
    <a href="index.php">Return to index page</a><br/>
    <br/>
    <?
        include('connect.php');
        include('constant.php');
        if (isset($_GET['news']) && is_numeric($_GET['news']))
        {
            echo '<a href="manage_newsletter.php">Back to select</a><br/><br/>';
            if (isset($_POST['rename_news']) && $_POST['rename_news']) // NEWS TITLE
            {
                $name = htmlspecialchars($_POST['rename_news']);
                $req = 'UPDATE `newsletter` SET name=\''.$name.'\' WHERE id='.$_GET['news'];
                mysql_query($req) or die("Error: " . mysql_error());
            }
            if (isset($_POST['rename_obj'])) // OBJECT OF MAIL
            {
                $obj = htmlspecialchars($_POST['rename_obj']);
                $req = 'UPDATE `newsletter` SET object=\''.$obj.'\' WHERE id='.$_GET['news'];
                mysql_query($req) or die("Error: " . mysql_error());
            }
            if (isset($_FILES['newsletter_html']))
            {
                $fichier = basename($_FILES['newsletter_html']['name']);
                $extensions = array('.html');
                $extension = strrchr($_FILES['newsletter_html']['name'], '.');
                if (!in_array($extension, $extensions))
                     $upload_message_error='You can only upload HTML files: example.html';
                else
                {
                     if (move_uploaded_file($_FILES['newsletter_html']['tmp_name'], NEWS_DIRECTORY.$_GET['news'].'.html'))
                          $upload_message_success='File: '.$fichier.' uploaded';
                     else
                          $upload_message_error='Error: couldn\'t upload, try again';
                }
            }

            
            $req = 'SELECT * FROM `newsletter` WHERE id='.$_GET['news'];
            $data = mysql_query($req) or die("Error: " . mysql_error());
            $news = mysql_fetch_assoc($data);
            
            ?>
            
            <h3 style="display: inline; margin-right: 10px;">Name: <? echo $news['name']; ?></h3>
            <form method="post" action="?news=<? echo $news['id'] ?>" style="display: inline;">
                <input style="width: 200px;" type="text" name="rename_news" value="" />
                <input type="submit" value="Rename" />
            </form>
            <br/><br/>
            <h4 style="display: inline; margin-right: 10px;">
                Object: 
                <? if ($news['object']) {echo $news['object'];} else { echo '<span style="color: red;">Not set yet<span>';} ?>
            </h4>
            <form method="post" action="?news=<? echo $news['id'] ?>" style="display: inline;">
                <input style="width: 200px;" type="text" name="rename_obj" value="" />
                <input type="submit" value="Change object" />
            </form>
            <br/><br/>
            <strong>Images: </strong><a href="manage_images.php?news=<? echo $news['id'] ?>">images for this newsletter</a>
            <br/><br/>
            <form method="POST" action="?news=<? echo $news['id'] ?>" enctype="multipart/form-data">
                HTML file : <input type="file" name="newsletter_html" />
                <input type="submit" name="upload" value="Upload file" />
                <? if (isset($upload_message_error)) {echo '<span style="color: red;">'.$upload_message_error.'</span>';} ?>
                <? if (isset($upload_message_success)) {echo '<span style="color: green;">'.$upload_message_success.'</span>';} ?>
            </form> 
            <br/>
            <?
            if (file_exists(NEWS_DIRECTORY.$news['id'].'.html'))
                echo '<a href="'.NEWS_DIRECTORY.$news['id'].'.html">Show HTML newsletter</a>';
            else
                echo 'No HTML newsletter uploaded yet';
            echo '<br/><br/>';
            echo '<a href="send.php?news='.$news['id'].'">Ready to send ?</a>';
            echo '<br/><br/>';
            $form = '<span style="color: #993333;">Delete newsletter: </span><form style="display: inline;" method="post" action="?">';
            $form .= '<input type="hidden" name="news_id" value="'.$news['id'].'"/>';
            $form .= '<input type="hidden" name="delete" value="yes"/>';
            $form .= '<input onclick="return confirm(\'Are you sure ?\');" type="submit" value="Delete" />';
            $form .= '</form>';
            echo $form;
        }
        else
        {
            if (isset($_POST['news_id']) && is_numeric($_POST['news_id']) &&
                isset($_POST['delete']) && $_POST['delete'] == "yes")
            {
                $req = 'DELETE FROM newsletter WHERE id='.$_POST['news_id'];
                mysql_query($req) or die("Error: " . mysql_error());
            }
            echo '<h3>Select a Newsletter to manage</h3>';
            $req = 'SELECT * FROM `newsletter`';
            $data = mysql_query($req) or die("Error: " . mysql_error());
            if (mysql_numrows($data))
            {
                while ($news=mysql_fetch_assoc($data))
                {
                    echo '<ul>';
                    echo '<li><a href="?news='.$news['id'].'">'.$news['name'].'</a></li>';
                    echo '</ul>';
                }
            }
            else
                echo '<p>You need to create one first: <a href="create_newsletter.php">create</a></p>';
        }
        include('deconnect.php');
    ?>
</body>
</html>

<?php

?>
