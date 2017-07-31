<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cookies Session MySql PgSql</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="row">
    <form class="form-inline col-md-6" action="index.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="file" class="form-control" name="userfile">
    <!--        <button type="file"></button>-->
        </div>
        <button type="submit" value="Send File" class="btn btn-success">Send file</button>
    </form>
</div>
<div class="row">
    <div class="container errors">

        <?php
        if($uploadError !== null)
        {
            echo $uploadError;
        }

        if($permissionError !== null)
        {
            echo $permissionError;
        }

        if($deletedError !== null)
        {
            echo $deletedError;
        }
        ?>
    </div>

</div>

<?php

if($fileInDir && (sizeof($fileSize) !==0))
{ ?>
    <table class="table table-bordered">
            <caption>Files</caption>
            <tr>
                <th>№</th>
                <th>File Name</th>
                <th>File size</th>
                <th>Action</th>
            </tr>
    <?php
    for($i=0;$i<$countFileInDir;$i++)
    {?>
        <tr>
            <td>
                <?php
                    echo $i+1;
                ?>
            </td>
            <td>
                <?php
                    echo $fileInDir[$i];
                ?>
            </td>
            <td>
                <?php
                    echo $fileSize[$i];
                ?>
            </td>
            <td>
                <a href="index.php?del=<?php echo  $fileInDir[$i] ?>">deleted</a>
            </td>
        </tr>
        <?php
    }
    ?>

        </table>
<?php
}
?>
</body>
</html>
