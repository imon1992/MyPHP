<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>task8</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container">
    <div class="row">
        <form class="form-inline col-md-offset-3" method="post" action="index.php">
            <div class="form-group">
                <input type="text" class="form-control" name="searchQuery">
            </div>
            <button type="submit" class="btn btn-default">Search</button>
        </form>
    </div>
</div>
<?php
if($searchGetError !== null)
{
    echo $searchGetError;
}
if(sizeof($dataArr) !==0)
{

    foreach($dataArr as $values)
    {?>
        <div class="list-group">
            <a href="<?php echo $values['link']?>" class="list-group-item">
                <h4><?php echo $values['name']?></h4>
                <p class="list-group-item-text"><?php echo $values['shortText']?></p>
            </a>
        </div>

    <?php
    }
}
?>
</body>
</html>
