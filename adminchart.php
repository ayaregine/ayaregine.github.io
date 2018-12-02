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
	<link href="jschart.css" rel="stylesheet">

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
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Others</h3>
                <ul class="nav side-menu">
				<li><a href="http://localhost/juansumbong/application/juansumbong_assigncomplaint.php"><i class="glyphicon glyphicon-info-sign"></i> Assign complaint</a></li>
				<li><a href="http://localhost/juansumbong/application/adminchart.php"><i class="glyphicon glyphicon-info-sign"></i> Dashboard</a></li>
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
                    <img src="images/icon.png" alt="">Juan Sumbong Admin Page
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
      
          <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Resolved</span>
              <div class="count">
			  <?php
							
							$con=mysqli_connect("localhost","root","","juansumbong","3307");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							
							$result = mysqli_query($con,"SELECT COALESCE(count(*),0) as count FROM `js_complaint` WHERE `resolved` = 'Completed' ");
							
							//echo mysqli_info($con); 
							
							while($row = mysqli_fetch_array($result))
							{
								echo $row["count"];
								
							}
							
							

							mysqli_close($con);
							
			 ?>
			  </div>
             
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Unassigned</span>
              <div class="count">
			  <?php
							
							$con=mysqli_connect("localhost","root","","juansumbong","3307");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
						
							$result = mysqli_query($con,"SELECT count(*) as count FROM `js_complaint` WHERE `assignee` = 'none' ");
							
							echo mysqli_info($con); 
							
							
							while($row = mysqli_fetch_array($result))
							{
								echo $row["count"];
								
							}

							mysqli_close($con);
							
						?>
			  </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Blocked Complaints</span>
              <div class="count">
			   <?php
							
							$con=mysqli_connect("localhost","root","","juansumbong","3307");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
						
							$result = mysqli_query($con,"SELECT count(*) as count FROM `js_complaint` WHERE `isblocked` = 'true' ");
							
							echo mysqli_info($con); 
							
							
							while($row = mysqli_fetch_array($result))
							{
								echo $row["count"];
								
							}

							mysqli_close($con);
							
						?>
			  </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Descoped Complaints</span>
              <div class="count">
			  <?php
							
							$con=mysqli_connect("localhost","root","","juansumbong","3307");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							
							$result = mysqli_query($con,"SELECT count(*) as count FROM `js_complaint` WHERE `resolved` = 'De-scoped' ");
							
							echo mysqli_info($con); 
							
							
							while($row = mysqli_fetch_array($result))
							{
								echo $row["count"];
								
							}

							mysqli_close($con);
							
						?>
			  </div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Complaints</span>
              <div class="count">
			   <?php
							
							$con=mysqli_connect("localhost","root","","juansumbong","3307");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							
							$result = mysqli_query($con,"SELECT count(*) as count FROM `js_complaint` ");
							
							echo mysqli_info($con); 
							
							
							while($row = mysqli_fetch_array($result))
							{
								echo $row["count"];
								
							}

							mysqli_close($con);
							
						?>
			  </div>
            </div>
          </div>
          <!-- /top tiles -->

          <br />

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>Gov't Office Progress</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4>Assigned complaints per Gov't offices</h4>
				  
				   <?php
							
							$con=mysqli_connect("localhost","root","","juansumbong","3307");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							
							$result = mysqli_query($con,"SELECT count(`juansumbonggovtoffice`) AS 'count', `juansumbonggovtoffice` FROM `js_complaint` GROUP BY juansumbonggovtoffice");
							
							echo mysqli_info($con); 
							
							
							while($row = mysqli_fetch_array($result))
							{
								echo'<div class="widget_summary">
								<div class="w_left w_25">
								  <span>
								  '.$row["juansumbonggovtoffice"].'
								  </span>
								</div>
								<div class="w_center w_55">
								  <div class="progress">
									<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: '.$row["count"].'%;">
									  <span class="sr-only">60% Complete</span>
									</div>
								  </div>
								</div>
								<div class="w_right w_20">
								  <span>'.$row["count"].'</span>
								</div>
								<div class="clearfix"></div>
							  </div>';
								
								
							}

							mysqli_close($con);
							
						?>
                </div>
              </div>
            </div>

			 <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>San Juan Barangay Progress</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4>Assigned complaints per Barangay</h4>
				  
				   <?php
							
							$con=mysqli_connect("localhost","root","","juansumbong","3307");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							
							$result = mysqli_query($con,"SELECT count(`juansumbongbarangay`) AS 'count', `juansumbongbarangay` FROM `js_complaint` GROUP BY juansumbongbarangay");
							
							echo mysqli_info($con); 
							
							
							while($row = mysqli_fetch_array($result))
							{
								echo'<div class="widget_summary">
								<div class="w_left w_25">
								  <span>
								  '.$row["juansumbongbarangay"].'
								  </span>
								</div>
								<div class="w_center w_55">
								  <div class="progress">
									<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: '.$row["count"].'%;">
									  <span class="sr-only">60% Complete</span>
									</div>
								  </div>
								</div>
								<div class="w_right w_20">
								  <span>'.$row["count"].'</span>
								</div>
								<div class="clearfix"></div>
							  </div>';
								
								
							}

							mysqli_close($con);
							
						?>
                </div>
              </div>
            </div>
			
			 <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <h2>San Juan Assignees Progress</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <h4>Assigned complaints per assignee</h4>
				  
				   <?php
							
							$con=mysqli_connect("localhost","root","","juansumbong","3307");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							
							$result = mysqli_query($con,"SELECT count(`assignee`) AS 'count', `assignee` FROM `js_complaint` GROUP BY assignee");
							
							echo mysqli_info($con); 
							
							
							while($row = mysqli_fetch_array($result))
							{
								if($row["assignee"] == "none")
								{
									$assignee = 'Unassigned';
								}
								else
								{
									$assignee = $row["assignee"];
								}
								echo'<div class="widget_summary">
								<div class="w_left w_25">
								  <span>
								  '.$assignee.'
								  </span>
								</div>
								<div class="w_center w_55">
								  <div class="progress">
									<div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: '.$row["count"].'%;">
									  <span class="sr-only">60% Complete</span>
									</div>
								  </div>
								</div>
								<div class="w_right w_20">
								  <span>'.$row["count"].'</span>
								</div>
								<div class="clearfix"></div>
							  </div>';
								
								
							}

							mysqli_close($con);
							
						?>
                </div>
              </div>
            </div>
			 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Juan Sumbong List of All Complaints<small> This shows the list of all complaints </small></h2>                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                     </p>
					
                  <form action="admindashboard.php" method="GET">
						  <table id="tbjuan" class="table table-striped jambo_table bulk_action">
					 <thead>
				        <tr>
						  <th>ReportID</th>
                          <th>Title of Complaint</th>
                          <th>Type of Complaint</th>
                          <th>Message</th>             
						  <th>Resolved</th>
						  <th>DateFiled</th>
						   <th>Gov't Office</th>
						  <th>Assignee</th>
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
							
							$result = mysqli_query($con,"SELECT `id`,`juansumbongtitlecomplaint`, `juansumbongtypeofcomplaint`,  `juansumbongmessage`, `resolved`, `datefiled`,`juansumbonggovtoffice`,`assignee` FROM `js_complaint`  ORDER BY `datefiled`");
							
							echo mysqli_info($con); 
							
							
							while($row = mysqli_fetch_array($result))
							{
								$id = $row["id"];
							
								echo '<tr>';
								echo '<td> ReportID '.$row["id"].'</td>';
								echo '<td>'.$row["juansumbongtitlecomplaint"].'</td>';
								echo '<td>'.$row["juansumbongtypeofcomplaint"].'</td>';
								echo '<td>'.$row["juansumbongmessage"].'</td>';
								echo '<td>'.$row["resolved"].'</td>';
								echo '<td>'.$row["datefiled"].'</td>';
								echo '<td>'.$row["juansumbonggovtoffice"].'</td>';
								echo '<td>'.$row["assignee"].'</td>';
								echo '</tr>';
								
							}

							mysqli_close($con);
							
						?>
                       
                      </tbody>
					  
					
                    </table>
					<br/><br/><br/>
        </div>
		  </div>  </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            JuanSumbong Application
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- footer content -->
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
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
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
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>