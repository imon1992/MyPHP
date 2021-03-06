<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

<div class="row">
    <div class="container">
<?php if($globalError === null){?>
        <table class="table">
            <caption>MySql</caption>
            <tr>
                <td>Operation</td>
                <td>result</td>
            </tr>
            <tr>
                <td>
                    save
                </td>
                <td>
                    <?php
                    if ($insertError === null) {
                        echo 'successful';
                    } else {
                        echo $insertError;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    update
                </td>
                <td>
                    <?php
                    if ($updateError === null) {
                        echo 'successful';
                    } else {
                        echo $updateError;
                    }
                    ?>
                </td>
            </tr>
            </tr>
            <td>
                read
            </td>
            <td>
                <?php
                if ($readError === null) {
                    echo 'successful';
                } else {
                    echo $readError;
                }
                ?>
            </td>
            </tr>
            <tr>
                <td>
                    deleted
                </td>
                <td>
                    <?php
                    if ($deleteError === null) {
                        echo  'successful';
                    } else {
                        echo $deleteError;
                    }
                    ?>
                </td>
            </tr>

        </table>
    </div>
        <?php }else{echo $globalError;}?>
</div>
</body>
</html>
