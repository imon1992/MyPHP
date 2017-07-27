<?php

$showResult = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MySql Postgres</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
<!--    <link rel="stylesheet" href="templates/style.css"> -->

  </head>
  <body>
    <div class="row">
      <div class="col-md-6">MySql
        <table class="table">
            <tr>
                <td>Operation</td>
                <td>result</td>
            </tr>
            <tr>
                <td>
                    insert
                </td>
                <td>';

if ($insertError === null) {
    $showResult .= 'successful';
} else {
    $showResult .= $insertError;
}
$showResult .= '</td>

                            </tr>
                            <tr>
                <td>
                    select
                </td>
                <td>';

if ($selectError === null) {
    $showResult .= 'successful';
} else {
    $showResult .= $selectError;
}
$showResult .= '</td>
            </tr>
            <td>
update
            </td>
            <td>';
if ($updateError === null) {
    $showResult .= 'successful';
} else {
    $showResult .= $updateError;
}
$showResult .= '</tr>
<tr>
<td>
deleted
</td>
<td>';

if ($deleteError === null) {
    $showResult .= 'successful';
} else {
    $showResult .= $deleteError;
}
$showResult .= '</td>
</tr>

        </table>
      </div>
      <div class="col-md-6">Postgres
        <table class="table">
            <tr>
                <td>Operation</td>
                <td>result</td>
            </tr>
        </table>
      </div>
    </div>

  </body>
</html>';


echo $showResult;