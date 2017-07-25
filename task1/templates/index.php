<?php
header('Content-Type: text/html; charset=utf-8');
?>

<html>
<form enctype="multipart/form-data" action="index.php"
 method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
</html>
