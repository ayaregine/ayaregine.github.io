<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Juan Sumbong</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="backend_1.php" method="POST">
              <h1>Juan Sumbong App <br/> </h1>
              <div>
			  <small> <p> Welcome to Juan Sumbong application. <br/> To proceed on the form please answer our security question to prove you are not a robot/troll/not legit citizen of San Juan. <br/> Thank you for your cooperation </p></small>
                <?php
							$question = ""; 
							$con=mysqli_connect("localhost","root","","juansumbong","3307");
							// Check connection
							if (mysqli_connect_errno())
							{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}

							$result = mysqli_query($con,"SELECT t.question, t.answer FROM js_securityquestion AS t JOIN (SELECT ROUND(RAND() * (SELECT MAX(id) FROM js_securityquestion)) AS id ) AS x WHERE t.id >= x.id LIMIT 1");
							
							$result2 = mysqli_query($con,"SELECT * from js_choices");
							
							echo '<br/>';
							while($row = mysqli_fetch_array($result))
							{
								$question = $row['question'];
								$correctanswer = $row['answer'];
								echo "<label for=\"juansumbonganswer\" class=\"right-col\"> Question: " . $row['question'] . "<span class=\"required\">*</span> </label>";
								echo "<select id=\"juansumbonganswer\" name=\"juansumbonganswer\" class=\"form-control col-md-7 col-xs-12\">";
								echo "<option>Choose answer here</option>";
								while($row2 = mysqli_fetch_array($result2))
								{
									echo "<option>".$row2['choices']."</option>";
								}
								echo "<option>".$row['answer']."</option>";
								echo "<option>None of the above</option>";
								
								echo "</select>";
								
							}

							mysqli_close($con);
							
						?>
						  <input type="hidden" name="juansumbongquestion" value="<?php echo $question; ?>">
					      <input type="hidden" name="juansumbongcorrectanswer" value="<?php echo $correctanswer; ?>">
						  <br/><br/><br/>
						  <button type="submit" class="btn btn-success form-control col-md-7 col-xs-12">Submit</button>
						  <button class="btn btn-primary form-control col-md-7 col-xs-12" type="reset">Clear</button>
              </div>
              <div>                        
              </div>
            
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  Please contact administrator for more details
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-desktop"></i> JuanSumbong application</h1>
                  <p>©2018 All Rights Reserved. St. Paul University</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
