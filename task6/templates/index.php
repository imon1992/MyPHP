<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Band</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

<div class="row">
    <div class="col-md-6">
        <div class="container">
            <div class="row" style="text-align: center">
                <?php
                    echo $bandName;
                ?>
            </div>
            <div class="row" style="text-align: center">
                <?php
                echo $genre;
                ?>
            </div>
            <table class="table">
                    <caption>Band info</caption>
                <tr>
                    <th>Musician name</th>
                    <th>Role in Band</th>
                    <th>Musician instrument</th>
                    <th>Instrument category</th>
                </tr>
                <?php
                    foreach($musicians as $key=>$val)
                    {
                        ?>
                        <tr>
                            <td>
                                <?php
                                    echo $key;
                                ?>
                            </td>
                            <td>
                                <?php
                                    echo $val['musicianType'];
                                ?>
                            </td>
                            <td>
                                <?php
                                    foreach($val['musicianInstrument'] as $instrument => $instrumentType)
                                    {
                                        echo $instrument . '<br>';

                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                foreach($val['musicianInstrument'] as $instrument => $instrumentType)
                                {
                                    echo $instrumentType . '<br>';

                                }
                                ?>
                            </td>
                        </tr>
                <?php
                    }
                ?>

            </table>

        </div>
    </div>
</div>

</body>
</html>
