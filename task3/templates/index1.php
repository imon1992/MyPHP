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
        <table class="table">
            <tr>
                <th>Replace String</th>
                <th>Replace Symbol</th>
            </tr>
            <tr>
                <td>
                    <?php

                    if( $errorReplaceString === null)
                    {
                        echo 'String Successful replace';
                    }else
                    {
                        echo  $errorReplaceString ;
                    }

                    ?>
                </td>
                <td>
                    <?php

                    if( $errorReplaceSymbol === null)
                    {
                        echo 'Symbol Successful replace';
                    }else
                    {
                        echo  $errorReplaceSymbol;
                    }

                    ?>
                </td>
            </tr>
        </table>
        <div


</body>
</html>