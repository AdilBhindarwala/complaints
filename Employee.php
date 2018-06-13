<!DOCTYPE HTML>  
<html>
  <head>

    <!-- Bootstrap Files -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign-Up</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!-- END -->

  </head>
    <body>  

      <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <div class="login-panel panel panel-default">
            <div class="panel-heading"><center>Sign Up</center></div>
              <div class="panel-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                  <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Employee Name" name="Employee_name" type="fname" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Employee CPF" name="Employee_CPF" type="lname" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Employee Phone Number" name="Employee_mobile" type="lname" autofocus="">
                                </div>
                                <!-- Message body -->
                                
                                <div class="form-group">
                                  <label class="col-md-3 control-label" for="message">Residential Address</label>
                                  <div class="col-md-9">
                                    <textarea class="form-control" id="message" name="ERA" placeholder="Please enter your residential address here..." rows="3"></textarea><br>
                                  </div>
                                </div>
                            
                                <div class="form-group">
                                  <label class="col-md-3 control-label" for="message">Office Address</label>
                                  <div class="col-md-9">
                                    <textarea class="form-control" id="message" name="EOA" placeholder="Please enter your office address here..." rows="3"></textarea><br>
                                  </div>
                                </div>
                                
                                <!-- /Messae Body -->
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="Employee_password" type="password" value="">
                                </div>

                                <input id="button" type="submit" class="btn btn-primary" value="Register">
                      </fieldset>
                  </form>
                </div>
            </div>
          </div><!-- /.col-->
        </div><!-- /.row -->  
      </div>

<?php

$servername = "localhost";
$username = "adil";
$password = "adil";
$dbname = "WebSite";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {

$query = "INSERT INTO emp (emp_cpf, emp_name, emp_res_add, emp_ofc_add, emp_mob, emp_pass) VALUES ('$_POST[Employee_CPF]', '$_POST[Employee_name]', '$_POST[ERA]', '$_POST[EOA]', '$_POST[Employee_mobile]', '$_POST[Employee_password]')";
}


if (mysqli_query($conn, $query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>



  </body>
</html>
