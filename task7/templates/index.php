<DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Bootstrap 101 Template</title>

 <!-- Bootstrap -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
 integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 </head>
 <body>
     <form class="form-horizontal" action="index.php">

   <div class="form-group">
     <label for="inputPassword3" class="col-sm-2 control-label">Full Name</label>
     <div class="col-sm-10 col-md-4">
       <input type="text" class="form-control" id="inputPassword3" placeholder="Full Name" name="fullName">
     </div>
   </div>
   <div class="form-group">
     <label for="inputPassword3" class="col-sm-2 control-label">Subject</label>
       <div class="col-sm-10 col-md-4">
       
                <div class="input-group">
      <input type="text" class="form-control" aria-label="...">
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-right">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </div><!-- /btn-group -->
    </div>
    
<!--       <input type="text" class="form-control" id="inputPassword3" placeholder="Subject"> -->
     </div>
   </div>
   <div class="form-group">
     <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
     <div class="col-sm-10 col-md-4">
       <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="Email">
     </div>
   </div>
     <div class="form-group">
     <label for="inputEmail3" class="col-sm-2 control-label">Message</label>
     <div class="col-sm-10 col-md-4">
       <textarea class="form-control" name="message" rows="3"></textarea>
     </div>
   </div>
   <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
       <button type="submit" class="btn btn-default">Send Message</button>
     </div>
   </div>
 </form>
 
 </body>
 </html>


