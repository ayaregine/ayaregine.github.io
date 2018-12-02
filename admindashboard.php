<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>JuanSumbong </title>

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
                <h2><?php
							
							$con=mysqli_connect("localhost","root","","juansumbong","3307");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							
							$uid = $_SESSION['uid'];
							$_SESSION['repId'] = $uid;
							$result = mysqli_query($con,"SELECT assignee FROM `js_complaint` WHERE  `assignee` = (select name from js_assignees where id = '$uid') ");
							
							echo mysqli_info($con); 
							
							
							while($row = mysqli_fetch_array($result))
							{
								$name = $row["assignee"];
								
							}
							echo $name;
							mysqli_close($con);
							
						?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                            <!--<h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="http://localhost/app/production/login.php"><i class="fa fa-edit"></i>JuanSumbong complaint form </a></li>
                  <li><a href="http://localhost/app/production/view.php"><i class="fa fa-desktop"></i>View complaint status</a></li>
                </ul> -->
              </div>
              <div class="menu_section">
                <h3>Others</h3>
               <ul class="nav side-menu">
                  <li><a href="http://localhost/juansumbong/application/about.html"><i class="glyphicon glyphicon-info-sign"></i>  About Us</a></li>
				  <li><a href="http://localhost/juansumbong/application/offices.php"><i class="glyphicon glyphicon-info-sign"></i>  Logout</a></li>
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
                    <img src="images/icon.png" alt="">Juan Sumbong Complaint Dashboard
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
            

            				
						
			<!-- page content -->

            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Complaint information <small> details here 	</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="juansumbongform" data-parsley-validate class="form-horizontal form-label-left" action="updatedata2.php" method="POST" enctype="multipart/form-data">

                     <?php
							
							$question = ""; 
							$con=mysqli_connect("localhost","root","","juansumbong","3307");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							$id = $_GET["repId"]; 
							if($id == null)
							{
								$id = $_SESSION['repId'];
							}
							
							$_SESSION['fromAdmin'] = $id;
							$result = mysqli_query($con,"SELECT * FROM js_complaint WHERE id = '$id'");
							
							while($row = mysqli_fetch_array($result))
							{
								$title = $row["juansumbongtitlecomplaint"];
								$type = $row["juansumbongtypeofcomplaint"];
								$barangay = $row["juansumbongbarangay"];
								$govtoffice = $row["juansumbonggovtoffice"];
								$picture = $row["juansumbongpicture"];
								$message = $row["juansumbongmessage"];
								
								if($row["resolved"] == 'false')
								{
									$resolved = "Unresolved";
								}
								else
								{
									$resolved = $row["resolved"];
								}
								$datefiled = $row["datefiled"];
								$lastupdated = $row["lastupdated"];
								$govtid = $row["juansumbonggovtid"];	
							}
						
							echo '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="juansumbongname">Name of complaint</label><div class="col-md-6 col-sm-6 col-xs-12">';
							echo '<input type="text" id="juansumbongname" name="juansumbongname" required="required" class="form-control col-md-7 col-xs-12" value="'.$title.'" readonly></div></div>';
							
							echo '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="juansumbonggovtid">Govt ID number </label><div class="col-md-6 col-sm-6 col-xs-12">';
							echo '<input type="text" id="juansumbonggovtid" name="juansumbonggovtid" required="required" class="form-control col-md-7 col-xs-12" value="'.$govtid.'" readonly></div></div>';
							
							echo '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="juansumbongtypeofcomplaint">Type of complaint</label><div class="col-md-6 col-sm-6 col-xs-12">';
							echo '<input type="text" id="juansumbongtypeofcomplaint" name="juansumbongtypeofcomplaint" required="required" class="form-control col-md-7 col-xs-12" value="'.$type.'" readonly></div></div>';
							
							echo '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="juansumbongbarangay">Type of complaint</label><div class="col-md-6 col-sm-6 col-xs-12">';
							echo '<input type="text" id="juansumbongbarangay" name="juansumbongbarangay" required="required" class="form-control col-md-7 col-xs-12" value="'.$barangay.'" readonly></div></div>';
							
							echo '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="juansumbonggovtoffice">Government office</label><div class="col-md-6 col-sm-6 col-xs-12">';
							echo '<input type="text" id="juansumbonggovtoffice" name="juansumbonggovtoffice" required="required" class="form-control col-md-7 col-xs-12" value="'.$govtoffice.'" readonly></div></div>';
							
							echo '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="juansumbongmessage">Additional notes </label><div class="col-md-6 col-sm-6 col-xs-12">';
							echo '<textarea id="juansumbongmessage" name="juansumbongmessage" class="form-control col-md-7 col-xs-12" name="message" data-parsley-trigger="keyup" data-parsley-maxlength="1000" data-parsley-validation-threshold="10"  readonly>'.$message.'</textarea></div></div>';
							
							echo '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="resolved">Resolved </label><div class="col-md-6 col-sm-6 col-xs-12">';
							echo '<input type="text" id="resolved" name="resolved" required="required" class="form-control col-md-7 col-xs-12" value="'.$resolved.'" readonly></div></div>';
							
							echo '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="datefiled">Date Filed </label><div class="col-md-6 col-sm-6 col-xs-12">';
							echo '<input type="text" id="datefiled" name="datefiled" required="required" class="form-control col-md-7 col-xs-12" value="'.$datefiled.'" readonly></div></div>';
							
							echo '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastupdated">Last Updated </label><div class="col-md-6 col-sm-6 col-xs-12">';
							echo '<input type="text" id="lastupdated" name="lastupdated" required="required" class="form-control col-md-7 col-xs-12" value="'.$lastupdated.'" readonly></div></div>';

							echo '<div class="form-group">
							<label for="message" class="control-label col-md-3 col-sm-3 col-xs-12">Photo<span class="required"></span> </label>
							<div class="col-md-6 col-sm-6 col-xs-12"><a href="photo.php?photo='.$picture.'"><b> <i> Click here to view photos </i> </b></a>
								 
								</div>
							</div>';
							mysqli_close($con);
							
						?>	
					   
					    <div class="ln_solid"></div>

					    <div class="x_title">
							<h2> Remarks <small>  details here </small></h2>
							<div class="clearfix"></div>
						</div>
				  
						<div class="form-group">
							<label for="message" class="control-label col-md-3 col-sm-3 col-xs-12">Remarks information<span class="required">*</span> </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea id="juansumbongremarks" name="juansumbongremarks" required="required" class="form-control col-md-7 col-xs-12" name="message" data-parsley-trigger="keyup" data-parsley-maxlength="1000" data-parsley-validation-threshold="10"></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span> </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <select id="juansumbongremarkstatus" name="juansumbongremarkstatus" class="form-control col-md-7 col-xs-12">
								<option>Choose option</option>
								<option value="Completed">Completed</option>
								<option value="De-scoped">De-scoped/Not Valid complaint</option>
							  </select>
							</div>
						</div>
						
					    <div class="ln_solid"></div>
					  
					   
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-7.5">
                          
                          <button type="submit" class="btn btn-success">Submit</button>
						  <button class="btn btn-primary" type="reset">Clear</button>
                        </div>
                      
                    </form>
            </div>
        <!-- /page content -->
    

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            JuanSumbong 2018
          </div>
          <div class="clearfix">	  
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>