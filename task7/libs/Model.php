<?php
class Model
{ 
    public function __construct()
    {

    }

    public function getArray()
    {        
        return array('%TITLE%'=>'Contact Form', '%ERRORS%'=>'Empty field'); 
    }

    public function checkForm()
    {
        if (filter_var($email_a, FILTER_VALIDATE_EMAIL)) {
            echo "E-mail ($email_a) указан верно.\n";
        }
<DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap 101 Template</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <form class="form-horizontal">

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Full Name</label>
    <div class="col-sm-10 col-md-4">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Full Name">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Subject</label>
              <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
      <div class="col-sm-10 col-md-4">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Subject">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10 col-md-4">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Message</label>
    <div class="col-sm-10 col-md-4">
      <textarea class="form-control" rows="3"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Send Message</button>
    </div>
  </div>
</form>
</body>
        return true;            
    }

    public function sendEmail()
    {
        // return mail()
    }       
}

