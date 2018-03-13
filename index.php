<?php
/**
 * Created by PhpStorm.
 * User: mandeera
 * Date: 2/25/18
 * Time: 10:37 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
<h1>Upload file here</h1>
<form enctype="multipart/form-data" action="upload.php" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
    Choose a file to upload: <input name="uploadedfile" type="file" /><br/>
    <input type="submit" value="Upload File">
</form>
</body>
</html>


