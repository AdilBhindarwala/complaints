<?php

// include the inclusions.php file for custom functions
include 'inclusions.php';
session_start();

$con = connect_db("localhost","adil","adil", "WebSite"); 

$cpf = $_POST['cpf'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM emp WHERE emp_cpf = $cpf AND emp_pass = \"$pass\"";
$result = $con->query($sql);

echo $result->num_rows;

if ($result->num_rows == 1) {
    while($row = $result->fetch_assoc()) {
        if($cpf === $row['emp_cpf'] && $pass === $row['emp_pass']) {

            $_SESSION['emp_cpf'] = $cpf;
            $_SESSION['emp_name'] = $row['emp_name'];
            $_SESSION['isadmin'] = $row['emp_isadmin'];
            echo "Redirecting...";
            header('Location: reg_comp.php');
        } else {
          echo "Connection to databasse failed.";
        }
    }
} else {
    echo "Login Failed";
}

$con->close();

?>
