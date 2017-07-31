<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="row">
    <div class="col-md-offset-3 sentColor" >%SUCCESSFUL_SENT%</div>
</div>
<form class="form-horizontal" method="post" action="">
    <div class="form-group">
        <label for="FullName" class="col-sm-2 control-label">Full Name</label>
        <div class=" col-md-5">
            <input type="text" class="form-control" id="FullName" placeholder="Full Name" name="fullName" value="%RIGHT_FULL_NAME%">
        </div>
        <div class="%ERROR_COLOR%">%EMPTY_STRING_ERROR%%WRONG_FULL_NAME%</div>
    </div>
    <div class="form-group">
        <label for="subject" class="col-sm-2 control-label">Subject</label>
        <!-- Single button -->
        <div class="col-md-5">
            <select class="form-control " name="subject">
                <option>Select Subject</option>
                <option %SELECTED_SUBJECT1%>subject 1</option>
                <option %SELECTED_SUBJECT2%>subject 2</option>
                <option %SELECTED_SUBJECT3%>subject 3</option>
            </select>
        </div>
        <div class="%ERROR_COLOR%">%SUBJECT_ERROR%</div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class=" col-md-5">
            <input type="text" class="form-control " id="email" placeholder="Email" name="email" value="%RIGHT_EMAIL%">
        </div>
        <div class="%ERROR_COLOR%">%WRONG_EMAIL%%EMAIL_ERROR%</div>
    </div>
    <div class="form-group">
        <label for="message" class="col-sm-2 control-label">Message</label>
        <div class=" col-md-5">
            <textarea class="form-control " rows="3" id="message" name="message" value="%RIGHT_MESSAGE%">%RIGHT_MESSAGE%</textarea>
        </div>
        <div class="%ERROR_COLOR%">%WRONG_MESSAGE%%MESSAGE_EMPTY%</div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2  col-md-5">
            <button type="submit" class="btn btn-default">Send Message</button>
        </div>
    </div>
</form>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
