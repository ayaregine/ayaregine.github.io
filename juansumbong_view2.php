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
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="http://localhost/juansumbong/application/index.php"><i class="fa fa-edit"></i>JuanSumbong complaint form </a></li>
                  <li><a href="http://localhost/juansumbong/application/juansumbong_view.php"><i class="fa fa-desktop"></i>View complaint status</a></li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Others</h3>
                <ul class="nav side-menu">
                  <li><a href="http://localhost/juansumbong/application/about.html"><i class="glyphicon glyphicon-info-sign"></i>  About Us</a></li></ul>
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
                    <img src="images/icon.png" alt="">Juan Sumbong Complaint Application form
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
            <div class="page-title">
             

             
            </div>

            <div class="clearfix"></div>

            <div class="row">
           
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Juan Sumbong Complaint<small> Shows the list of complaint for specific contactnumber identifier</small></h2>                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                    This shows the list of complaints made for contact number <b> 
					<?php
						echo $number = $_POST["juansumbongnumber"]; 
					
					?> </b>
                    </p>
					
                    <table id="datatable-buttons" class="table table-striped jambo_table bulk_action">
					 <thead>
				        <tr>
						  <th>ReportID</th>
                          <th>Title of Complaint</th>
                          <th>Type of Complaint</th>
                          <th>Gov't Office</th>
                          <th>Message</th>             
						  <th>Resolved</th>
						  <th>DateFiled</th>
						  <th>Assignee</th>
                        </tr>
                      </thead>
                      <tbody>
					<?php
							
							$con=mysqli_connect("localhost","root","","juansumbong","3306");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}

							
							$result = mysqli_query($con,"SELECT `id`,`juansumbongtitlecomplaint`, `juansumbongtypeofcomplaint`, `juansumbonggovtoffice`, `juansumbongpicture`, `juansumbongmessage`, `resolved`, `datefiled`, `juansumbongname`,`assignee` FROM `js_complaint` WHERE `juansumbongnumber` = '$number'");
							
							while($row = mysqli_fetch_array($result))
							{
								echo '<tr>';
								echo '<td>'.$row["id"].'</td>';
								echo '<td>'.$row["juansumbongtitlecomplaint"].'</td>';
								echo '<td>'.$row["juansumbongtypeofcomplaint"].'</td>';
								
								if($row["juansumbonggovtoffice"] == "notyetassigned")
								{
									echo '<td>Unassigned</td>';
								}
								else
								{
									echo '<td>'.$row["juansumbonggovtoffice"].'</td>';
								}
								
								//echo '<td><img style="width: 100%; display: block;" src="'.$row["juansumbongpicture"].'" alt="image" /></td>';
								echo '<td>'.$row["juansumbongmessage"].'</td>';
								if($row["resolved"] == "false")
								{
									echo '<td>Not yet resolved</td>';
								}
								else
								{
									echo '<td>Resolved</td>';
								}
								
								echo '<td>'.$row["datefiled"].'</td>';
								echo '<td>'.$row["assignee"].'</td>';
								echo '</tr>';
								
							}

							mysqli_close($con);
							
						?>
                       
                      </tbody>
                    </table>
					
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
          Juan Sumbong 2018. St. Paul University
          </div>
          <div class="clearfix"></div>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>