<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
    <title>Manage images</title>
    <style type="text/css">
        th
        {
            border: groove;
            background-color: #EEE;
            border-width: 1pt;
        }
        td
        {
            border: 1px solid gray;
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
    
    if (isset($_FILES['image_to_up']))
    {
        if (!$_POST['image_name'])
            $upload_message_error = 'You need to give it a name';
        else
        {
            $imageName = htmlspecialchars($_POST['image_name']);
            $fichier = basename($_FILES['image_to_up']['name']);
            $extensions = array('.png', '.jpg');
            $extension = strrchr($_FILES['image_to_up']['name'], '.');
            if (!in_array($extension, $extensions))
                 $upload_message_error='You can only upload PNG or JPG files: my_image.png or my_image.jpg';
            else
            {
                $image_url = IMAGES_DIRECTORY.$imageName.'_'.$_GET['news'].$extension;
                 if (move_uploaded_file($_FILES['image_to_up']['tmp_name'], $image_url))
                 {
                      $upload_message_success='File: '.$fichier.' uploaded';
                      $req = 'INSERT INTO `image` (`id`, `newsletter_id`, `name`, `extension`) VALUES (NULL, \''.$_GET['news'].'\', \''.$imageName.'\', \''.$extension.'\')';
                      mysql_query($req) or die("Error: " . mysql_error());
                 }
                 else
                      $upload_message_error='Error: couldn\'t upload, try again';
            }
        }
    }

    if (isset($_POST['delete_image']) && is_numeric($_POST['delete_image']))
    {
        $req = 'SELECT * FROM image WHERE id='.$_POST['delete_image'];
        $data = mysql_query($req) or die("Error: " . mysql_error());
        $image = mysql_fetch_assoc($data);
        $image_src = IMAGES_DIRECTORY.$image['name'].'_'.$image['newsletter_id'].$image['extension'];
        unlink($image_src);
        $req = 'DELETE FROM image WHERE id='.$_POST['delete_image'];
        mysql_query($req) or die("Error: " . mysql_error());
    }
    
    ?>
    <a href="index.php">Back to index page</a><br/><br/>
    <a href="manage_newsletter.php?news=<? echo $_GET['news'] ?>">Back to newsletter editing</a><br/><br/>
    <form method="POST" action="?news=<? echo $_GET['news'] ?>" enctype="multipart/form-data">
        Image file (.png or .jpg) : <input type="file" name="image_to_up" />
        <br/>
        Name of the image: <input type="text" name="image_name" value="" /> (without any special characteres)
        <br/>
        <input type="submit" name="upload" value="Upload image" />
        <? if (isset($upload_message_error)) {echo '<span style="color: red;">'.$upload_message_error.'</span>';} ?>
        <? if (isset($upload_message_success)) {echo '<span style="color: green;">'.$upload_message_success.'</span>';} ?>
    </form>
    <br/><br/>
    <?
        $req = 'SELECT * FROM image WHERE newsletter_id='.$_GET['news'];
        $data = mysql_query($req) or die("Error: " . mysql_error());
        
        $tableau_html = '<table bgcolor="#EEEEFF" frame="border" cellpadding="5">';
        $tableau_html .= '<tr>';
            $tableau_html .= '<th align="center">Name</th>';
            $tableau_html .= '<th align="center">Preview</th>';
            $tableau_html .= '<th align="center">Url</th>';
            $tableau_html .= '<th align="center">Delete</th>';
        $tableau_html .= '</tr>';
        while ($image = mysql_fetch_assoc($data))
        {
            $image_src = IMAGES_DIRECTORY.$image['name'].'_'.$image['newsletter_id'].$image['extension'];
            $image_url = $_SERVER['SERVER_NAME'].substr($image_src, 2);
            
            $tableau_html .= '<tr>';
            $tableau_html .= '<td>'.$image['name'].'</td>';
            $tableau_html .= '<td><a href="'.$image_src.'"><img style="width: 70px;" src="'.$image_src.'" /></a></td>';
            $tableau_html .= '<td>'.$image_url.'</td>';
            $tableau_html .= '<td><form method="post" action="">';
            $tableau_html .= '<input type="hidden" name="delete_image" value="'.$image['id'].'" />';
            $tableau_html .= '<input style="width: 50px;" onclick="return confirm(\'Are you sure ?\')" border=0 src="'.BIN_IMAGE.'" type=image Value=submit align="middle"></form></td>';
            $tableau_html .= '</tr>';
        }
        $tableau_html .= '</table>';
        echo $tableau_html;
        include('deconnect.php');
    ?>
</body>
</html>
