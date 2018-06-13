<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumino - Tables</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/bootstrap-table.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Icons-->
    <script src="js/lumino.glyphs.js"></script>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    </head>
    
    <body>
    <div class="container">
        <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table data-toggle="table">
						    <thead>
						    <tr>
						        <th data-field="state" >Complaint ID</th>
						        <th data-field="id" data-sortable="true">Description</th>
						        <th data-field="name" >Type</th>
						        <th data-field="status">Status</th>
                                <th data-field="place">Place</th>
                                <th data-field="date">Date</th>
                                <th data-field="button"></th>
						    </tr>
						    </thead>
                            
<?php

include 'inclusions.php';
session_start();

$cpf = $_SESSION['emp_cpf'];

if(!$cpf) {
    header('Location: index.php');
}

$con = connect_db("localhost","adil","adil", "WebSite"); 

$sql = "SELECT * FROM comp";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "
        		<tr>
				    <td> ".$row['comp_id']." </td>
				    <td> ".$row['comp_desc']." </td> 
				    <td> ".$row['comp_type']." </td>
				    <td> ".$row['comp_status']." </td>
				    <td> ".$row['comp_place']." </td>
				    <td> ".$row['comp_reg_date']." </td>
                    <td><center> 
                        <a href='update_comp.html'><span class='glyphicon glyphicon-pencil'></span></a>
                        <a href=''><span class='glyphicon glyphicon-trash'></span></a>
                    </center></td>
				</tr>
        	";
    }
} else {
    echo "You have not registered a complaint yet.";
}
$con->close();

?>

						</table>
					</div>
                </div>
            </div>
        </div><!--/.row-->	    
    </div>
    <script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
    </script>
    
    <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
        
    </body>
</html>