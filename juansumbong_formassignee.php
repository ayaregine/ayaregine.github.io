<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>JuanSumbong</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
 <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">	
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-desktop"></i> <span>JuanSumbong Application</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/icon.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Citizens of San Juan</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
             
              <div class="menu_section">
                <h3>Others</h3>
                <ul class="nav side-menu">
                  <li><a href="http://localhost/juansumbong/application/about.html"><i class="glyphicon glyphicon-info-sign"></i>  About Us</a></li>
				  <li><a href="http://localhost/juansumbong/application/admin.php"><i class="glyphicon glyphicon-info-sign"></i>  Logout</a></li>
				 </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/icon.png" alt="">Juan Sumbong Complaint List
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Assign complaint information <small> data that contains unassigned complaints </small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="juansumbongform" data-parsley-validate class="form-horizontal form-label-left" action="updatedata.php" method="POST" enctype="multipart/form-data">

					
						  <table id="tbjuan" class="table table-striped table-bordered">
					 <thead>
				        <tr>
						  <th>ReportID</th>
                          <th>Title of Complaint</th>
                          <th>Type of Complaint</th>
                          <th>Message</th>             
						  <th>Resolved</th>
						  <th>DateFiled</th>
						  <th>Gov't Office</th>
						  <th>Block/Accept User</th>
                        </tr>
                      </thead>
                      <tbody>
					<?php
							
							$con=mysqli_connect("localhost","root","","juansumbong","3307");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							$id = $_GET["repId"];
							echo '<input type="hidden" id="js_id" name="js_id" value="'.$id.'">';
							$result = mysqli_query($con,"SELECT `id`,`juansumbongtitlecomplaint`, `juansumbongtypeofcomplaint`, `juansumbongmessage`, `resolved` ,`datefiled`FROM `js_complaint` WHERE `id` = '$id'");
							
							
							while($row = mysqli_fetch_array($result))
							{
								$id = $row["id"];
								echo '<tr>';
								echo '<td>'.$row["id"].'</td>';
								echo '<td>'.$row["juansumbongtitlecomplaint"].'</td>';
								echo '<td>'.$row["juansumbongtypeofcomplaint"].'</td>';
								echo '<td>'.$row["juansumbongmessage"].'</td>';
								echo '<td>'.$row["resolved"].'</td>';
								echo '<td>'.$row["datefiled"].'</td>';
								echo '<td><select id="juansumbongoffice" name="juansumbongoffice" class="form-control col-md-7 col-xs-12">';
                            	
								if (mysqli_connect_errno())
								{
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}
								$id = $_GET["repId"];
								
								$result2 = mysqli_query($con,"SELECT * FROM `js_offices`");
								
								while($row2 = mysqli_fetch_array($result2))
								{
									echo '<option>'.$row2["name"].'</option>';
									
								}									
								echo'</td></select>';
															
								echo '<td><select id="juansumbongblocked" name="juansumbongblocked" class="form-control col-md-7 col-xs-12">';
                            	echo '<option value="true">Block user</option>';
								echo '<option value="false">Accept user</option>';								
								echo'</td></select>';
								echo '</tr>';
								
							}

							mysqli_close($con);
							
						?>
                       
                      </tbody>
					  
					
                    </table>
						
               
					 
					   <div class="ln_solid"></div>
					  
					   
                      <div class="form-group">
                        <div class="">
                          
                          <button type="submit" class="btn btn-success">Submit</button>
						  <button class="btn btn-primary" type="reset">Clear</button>
                        </div>
                      </div>
					
								  
					  
                    </form>
                  </div>
                </div>
              </div>
            </div>
        <!-- /page content -->
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
