<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cookies Session MySql PgSql</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

<div class="row">
    <div class="col-md-6">
        <div class="container">

            <table class="table">
                <caption>Cookie</caption>
                <tr>
                    <td class="col-md-2">Save data</td>
                    <td class="col-md-2">Get data</td>
                    <td class="col-md-2">Deleted data</td>
                </tr>
                <tr>
                    <td>
                        <?php
                            if($cookieSaveError !== null)
                            {
                                echo $cookieSaveError;
                            }else
                            {
                                echo 'Successful Save';
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($cookieGetError !== null) {
                            echo $cookieGetError;
                        } else {
                            echo $cookieGetResult;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($cookieDeletedError !== null) {
                            echo $cookieDeletedError;
                        } else {
                            echo 'Successful deleted';
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="container">

            <table class="table">
                <caption>Session</caption>
                <tr>
                    <td class="col-md-2">Save data</td>
                    <td class="col-md-2">Get data</td>
                    <td class="col-md-2">Deleted data</td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if($sessionSaveError !== null)
                        {
                            echo $sessionSaveError;
                        }else
                        {
                            echo 'Successful Save';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($sessionGetError !== null) {
                            echo $sessionGetError;
                        } else {
                            echo $sessionGetResult;
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($sessionDeleterError !== null) {
                            echo $sessionDeleterError;
                        } else {
                            echo 'Successful deleted';
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="container">

            <table class="table">
                <caption>MySql</caption>
                <tr>
                    <td class="col-md-2">Save data</td>
                    <td class="col-md-2">Get data</td>
                    <td class="col-md-2">Deleted data</td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if($mySqlSaveError !== null)
                        {
                            echo $mySqlSaveError;
                        }else
                        {
                            echo 'Successful Save';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($mySqlGetError !== null) {
                            echo $mySqlGetError;
                        } else {
                            foreach($mySqlGetResult as $value)
                            {
                                echo 'key:' . $value[0] .'; data:' . $value[1];
                                echo '<br>';
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($mySqlDeleterError !== null) {
                            echo $mySqlDeleterError;
                        } else {
                            echo 'Successful deleted';
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="container">

            <table class="table">
                <caption>PgSql</caption>
                <tr>
                    <td class="col-md-2">Save data</td>
                    <td class="col-md-2">Get data</td>
                    <td class="col-md-2">Deleted data</td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if($pgSaveError !== null)
                        {
                            echo $pgSaveError;
                        }else
                        {
                            echo 'Successful Save';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($pgGetError !== null) {
                            echo $pgGetError;
                        } else {
                            foreach($pgGetResult as $value)
                            {
                                echo 'key:' . $value[0] .'; data:' . $value[1];
                                echo '<br>';
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($pgDeletedError !== null) {
                            echo $pgDeletedError;
                        } else {
                            echo 'Successful deleted';
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

</body>
</html>
