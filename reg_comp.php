<!DOCTYPE HTML>
<html>

  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forms</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

  </head>

  <body>
      
      <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
         <div class="login-panel panel panel-default">
          <div class="panel-heading"><center>Register Complaint</center></div>
           <div class="panel-body">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
              <fieldset>
      
                <div class="form-group">
                  <label class="col-md-3 control-label" for="message">Complaint Description</label>
                  <div class="col-md-9">
                    <textarea class="form-control" id="message" name="comp_desc" placeholder="Please enter your complaint description here..." rows="3"></textarea><br>
                  </div>
                </div>

                <div class="form-group">                  
                  <label>Complaint Type : </label>
                  <select class="form-control" name="comp_type">
                    <option value="1">Civil</option>
                    <option value="2">Electrical</option>
                    <option value="3">HouseKeeping</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Complaint Place : </label>
                  <select class="form-control" name="comp_place">
                    <option value="1">Office</option>
                    <option value="2">Residence</option>  
                  </select>
                </div>

                <input id="button" type="submit" class="btn btn-primary" value="Register">

              


<?php

include 'inclusions.php';
session_start();

$isadmin = $_SESSION['isadmin'];

if(!$isadmin) {
    echo '
          <a href="view_comp.php" class="btn btn-primary">View your complaints</a>
          ';
} else {
    echo '<a href="view_comp.php" target = "_blank" class="btn btn-primary">View your complaints</a><br>';
    echo '<a href="view_all_comp.php" target = "_blank" class="btn btn-primary">View all complaints</a><br>';  
}

if($_POST) {
    
    $cpf = $_SESSION['emp_cpf'];
    
    $comp_type = $_POST['comp_type'];
    $comp_desc = $_POST['comp_desc'];
    $comp_place = $_POST['comp_place'];
    $comp_reg_date = date("Y-m-d");
    $comp_status = 1;
    $con = connect_db('localhost', 'adil', 'adil', 'WebSite');

    $sql = "INSERT INTO comp (comp_type, comp_desc, comp_status, comp_place, comp_reg_date, comp_emp) VALUES ($comp_type, '$comp_desc', $comp_status, $comp_place, '$comp_reg_date', $cpf)";

    if ($con->query($sql) === TRUE) {
        echo "Complaint registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

mysqli_close($con);

?>
  
              </fieldset>  
            </form>
          </div>
        </div>
      </div>

  </body>
</html>