<DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  
<body>
  <div class="container">

<div class="row">

  <div class="col-md-2">

<?php
echo $select;
?>
  </div>
</div>
<div class="row">

  <?php
  echo $ulOl;
  ?>
</div>
      <div class="row">
          <?php
          echo $table;
          ?>
      </div>
      <div class="row">
          <?php
            echo $radio;
          ?>
      </div>
      <div class="row">
          <?php
            echo $checkBox;
          ?>
      </div>
  </div>


</body>
</html>

