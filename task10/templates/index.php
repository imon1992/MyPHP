<DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">
    <body>

        <div class="container">

            <div class="row">
                <label>Select:</label>
                <?php echo $select?>

            </div>
            <div class="row">
                <label>InnerJoin:</label>
                <?php echo $innerJoin?>

            </div>
            <div class="row">
                <label>Having:</label>
                <?php echo $having?>

            </div>
            <div class="row">
                <label>LeftJoin:</label>
                <?php echo $leftJoin?>

            </div>
            <div class="row">
                <label>RightJoin:</label>
                <?php echo $rightJoin?>

            </div>
            <div class="row">
                <label>CrossJoin:</label>
                <?php echo $crossJoin?>

            </div>
            <div class="row">
                <label>NaturalJoin:</label>
                <?php echo $naturalJoin?>

            </div>
            <div class="row">
                <label>SelectDistinct:</label>
                <?php echo $selectDistinct?>

            </div>
            <div class="row">
                <label>Insert:</label>
                <?php echo $insert?>

            </div>
            <div class="row">
                <label>Update:</label>
                <?php echo $update?>

            </div>
            <div class="row">
                <label>Delete:</label>
                <?php echo $deleted?>

            </div>

        </div>

    </body>
</html>

