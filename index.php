<?php
  require 'connect.php';
  /*if ($_SERVER['REQUEST_METHOD']=='POST'){*/

    if(isset($_POST['submit'])){
    $name     =$_POST['name'];
    $email    =$_POST['email'];
    $password =$_POST['password'];
	$login =$_POST['logintype'];
    

    $sql= "INSERT INTO reg (name,email,password,logintype) VALUES ('$name','$email','$password','$login')";
    $result=mysqli_query($conn,$sql);
  
    if($result){
      //echo ("data inserted");
      //header('location:display.php');
    } else {
    echo ("not inserted");
      //die(mysqli_error($conn));
    }

  }

  /* Feedback table connection*/  

  if(isset($_POST['fsubmit'])){

	  
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];	
  $comment = $_POST['message'];

  $sql ="INSERT INTO `feedback`(`Firstname`, `Lastname`, `Email`, `Phone number`, `Message`) VALUES ('$firstname','$lastname','$email','$phone','$comment')";
  $result=mysqli_query($conn,$sql);

  if($result){
	  //echo "thankyou for your feedback";
  } else {
	  //echo " No successfull";
	  
  }
  }


  	// Login


	  if(isset($_POST['submit'])){
        $checkname = $_POST['email'];
        $checkpassword = $_POST['password'];
		$checklogintype = $_POST['logintype'];
        //Query for retrieving username and password

        $sql = "SELECT Email,Password,logintype FROM reg WHERE Email ='$checkname' AND Password='$checkpassword' AND  logintype='$checklogintype'";
        
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)){
                $_SESSION['Email']=$checkname;
                //header('location:project.html');  
                //die; ;
				//echo "login success";             
                
		} else {
               //alertMsg("Invalid Login!! Please try again.");
               //header('location:loginForm.php');  
			   echo "Invalid Login";
        }

	}
?>


<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- META DATA -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
		
        <!-- TITLE OF SITE -->
        <title>Cinnamon Way</title>

        <!-- for title img -->
		<link rel="shortcut icon" type="image/icon" href="assets/images/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!--linear icon css-->
		<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
		
		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">
		
		<!--hover.css-->
        <link rel="stylesheet" href="assets/css/hover-min.css">
		
		<!--vedio player css-->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">

		<!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link href="assets/css/owl.theme.default.min.css" rel="stylesheet"/>


        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link href="assets/css/bootsnav.css" rel="stylesheet"/>	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

		
		
		
		<!--header start-->
		<section class="header">
			<div class="container">	
				<div class="header-left">
					<ul class="pull-left">
						<li>
							<a href="#">
								
							</a>
						</li><!--/li-->
						<li>
							<a href="#">
								
							</a>
						</li><!--/li-->
					</ul><!--/ul-->
				</div><!--/.header-left -->
				<div class="header-right pull-right">
					<ul>
						<li class="reg">
							<a href="#" data-toggle="modal" data-target=".bs-example-modal-lg">
								Register
							</a>
								/
							<a href="#" data-toggle="modal" data-target=".bs-example-modal-sm">
								Log in
							</a>
							
							<!-- small modal -->
							<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
								<div class="modal-dialog modal-sm" role="document">
									<div class="modal-content">
										<div class="modal-header">
											 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											 	<span aria-hidden="true">
											 		<i class="fa fa-close"></i>
											 	</span>
											 </button> 
											<h4 class="modal-title" id="mySmallModalLabel">
												Login
											</h4> 
											<form class="sm-frm" style="padding:25px">
											<label>Login As:</label>
                                    				<select name="logintype" class="logintype">
                                       				 <!--option value="none">Select Your Login As:</option-->
                                        			<option value="Admin">Admin</option>
                                        			<option value="Agent">Agent</option>
                                        			<option value="Customer">Customer</option>
                                        			
                                    			</select> <br>
												<label>Email :</label>
												<input type="text" class="form-control" placeholder="Enter Email" name="email">
												<label>Passoward :</label>
												<input type="text" class="form-control" placeholder="Enter Passoward" name="password">
												<label><input type="checkbox" name="personality"> Remember Me</label>

												<p align = "right">
												 <input type = "submit" button type ="button" class="btn btn-danger" value = "Submit" name="lsubmit">
												 </p>


												<!--button type="submit"  button type ="button" class="btn btn-danger ">Submit</button-->
											</form>
										</div>
									</div>
								</div>
							</div>
							
							<!-- large modal -->
							<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											 	<span aria-hidden="true">
											 		<i class="fa fa-close"></i>
											 	</span>
											</button>  
											<h4 class="modal-title" id="myLargeModalLabel">Register</h4> 
											
											<form method="POST" class="lg-frm" style="padding:25px">
												<label>Name :</label>
												<input type="text" name= "name"class="form-control" placeholder="Enter Name">
												<label>Email :</label>
												<input type="text"name = "email" class="form-control" placeholder="Enter Email">
												<label>Password :</label>
												<input type="text" name = "password"class="form-control" placeholder="Enter Passoward">
												
                                						<label>Register As:</label><br>
                                    				<select name="logintype" class="logintype">
                                       				 <!--option value="none">Select Your Login As:</option-->
                                        			<option value="Admin">Admin</option>
                                        			<option value="Agent">Agent</option>
                                        			<option value="Customer">Customer</option>
                                        			
                                    			</select>

												<br>
                                                 <p align = "right">
												 <input type = "submit" button type ="button" class="btn btn-danger" value = "Submit" name="submit">
												 </p>
                                                
												<!--<button type="button" class="btn btn-default pull-right">Submit</button>-->
											</form>
										</div>
									</div>
								</div>
							</div>
						</li><!--/li -->
						<li>
							<!--div class="social-icon"-->
								<!--ul-->
									<!--li><a href="#"><i class="fa fa-facebook"></i></a></li-->
									<!--li><a href="#"><i class="fa fa-google-plus"></i></a></li-->
									<!--li><a href="#"><i class="fa fa-linkedin"></i></a></li-->
									<!--li><a href="#"><i class="fa fa-twitter"></i></a></li-->
								</ul><!--/.ul -->
							</div><!--/.social-icon -->
						</li><!--/li -->
					</ul><!--/ul -->
				</div><!--/.header-right -->
			</div><!--/.container -->	

		</section><!--/.header-->	
		<!--header end-->
		
		<!--menu start-->
		<section id="menu">
			<div class="container">
				<div class="menubar">
					<nav class="navbar navbar-default">
					
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php">
								
								<img src="assets/images/banner/logo 4.png" alt="logo">
								<!--Cinnamon Way-->
							</a>
						</div><!--/.navbar-header -->

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li class="active"><a href="index.php">Home</a></li>
								<li><a href="about.html">Order</a></li>
								<li><a href="team.html">Our Team</a></li>
								<li><a href=#3>Contact</a></li>
								
								
								
								
								<li>
									<a href="#">
										<!--span class="lnr lnr-cart"--></span>
									</a>
								</li>
								<li class="search">
									<form action="">
										<!--input type="text" name="search" placeholder="Search...."-->
										<a href="#">
											<!--span class="lnr lnr-magnifier"--></span>
										</a>
									</form>
								</li>
							</ul><!-- / ul -->
						</div><!-- /.navbar-collapse -->
					</nav><!--/nav -->
				</div><!--/.menubar -->
			</div><!-- /.container -->

		</section><!--/#menu-->
		<!--menu end-->
		
		<!-- header-slider-area start -->
		<section class="header-slider-area">
			<div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
			
			  <!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<div class="single-slide-item slide-1">
							<div class="container">
								<div class="row">
									<div class="col-sm-12">
										<div class="single-slide-item-content">
											<h2>Sell Your <br> Cinnamon to us</h2>
											<p>
												We are Unique buyers of Cinnamon.You can sell your Cinnamon to us with trust for a fair price.
											</p>
											
											
										</div><!-- /.single-slide-item-content-->
									</div><!-- /.col-->
								</div><!-- /.row-->
							</div><!-- /.container-->
						</div><!-- /.single-slide-item-->
					</div><!-- /.item .active-->
					<div class="item">
						<div class="single-slide-item slide-2">
							<div class="container">
								<div class="row">
									<div class="col-sm-12">
										<div class="single-slide-item-content">
											<h2>
												Sell your <br> Cinnamon to Us
											</h2>
											<p>
											We are Unique buyers of Cinnamon.You can sell your Cinnamon to us with trust for a fair price.  
											</p>
											
										</div><!-- /.single-slide-item-content-->
									
									</div><!-- /.col-->
								</div><!-- /.row-->
							</div><!-- /.container-->
						</div><!-- /.single-slide-item-->
					</div><!-- /.item .active-->
				</div><!-- /.carousel-inner-->


			

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="lnr lnr-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="lnr lnr-chevron-right"></span>
				</a>
			</div><!-- /.carousel-->

		</section><!-- /.header-slider-area-->
		<!-- header-slider-area end -->
		
		<!--we-do start -->
		<section  class="we-do">
			<div class="container">
				<div class="we-do-details">
					<div class="section-header text-center">
						<h2>what we do</h2>
						<p>
							We buy your standard quality cinnamon in standard quality for an exelant price.All you have to do is select your district in the country and contact our agent near you.
						</p>
					</div><!--/.section-header-->
					<div class="we-do-carousel">
						<div class="row">
							<div class="col-sm-4 col-xs-12">
								<div class="single-we-do-box text-center">
									<div class="we-do-description">
										<div class="we-do-info">
											<div class="we-do-img">
												<img src="assets/images/home/consultency.png" alt="image of consultency" />
											</div><!--/.we-do-img-->
											<div class="we-do-topics">
												<h2>
													<a href="#">
														Friendly Customer Service
													</a>
												</h2>
											</div><!--/.we-do-topics-->
										</div><!--/.we-do-info-->
										<div class="we-do-comment">
											<p>
												From the moment you visit our website we provide you friendly service just for your convenience.
											</p>
										</div><!--/.we-do-comment-->
									</div><!--/.we-do-description-->
								</div><!--/.single-we-do-box-->
							</div><!--/.col-->
							<div class="col-sm-4 col-xs-12">
								<div class="single-we-do-box text-center">
									<div class="we-do-description">
										<div class="we-do-info">
											<div class="we-do-img">
												<img src="assets/images/home/busisness_grow.png" alt="image of business" />
											</div><!--/.we-do-img-->
											<div class="we-do-topics">
												<h2>
													<a href="#">
														Attractive Prices
													</a>
												</h2>
											</div><!--/.we-do-topics-->
										</div><!--/.we-do-info-->
										<div class="we-do-comment">
											<p>
												We purchase your hardly cultivates cinnamon for a very fair price.
											</p>
										</div><!--/.we-do-comment-->
									</div><!--/.we-do-description-->
								</div><!--/.single-we-do-box-->
							</div><!--/.col-->
							<div class="col-sm-4 col-xs-12">
								<div class="single-we-do-box text-center">
									<div class="we-do-description">
										<div class="we-do-info">
											<div class="we-do-img">
												<img src="assets/images/home/support-logo.png" alt="image of support" />
											</div><!--/.we-do-img-->
											<div class="we-do-topics">
												<h2>
													<a href="#">
														Supportive agents
													</a>

												</h2>
											</div><!--/.we-do-topics-->
										</div><!--/.we-do-info-->
										<div class="we-do-comment">
											<p>
												Our agents are very supportive and will give you a friendly service and if you have any doubts you can contact your near-by agent. 
											</p>
										</div><!--/.we-do-comment-->
									</div><!--/.we-do-description-->
								</div><!--/.single-we-do-box-->
							</div><!--/.col-->
						</div><!--/.row-->
					</div><!--/.we-do-carousel-->
				</div><!--/.we-do-details-->
			</div><!--/.container-->

		</section><!--/.we-do-->
		<!--we-do end-->

		
			

		
		
		<!--contact start-->
		<section  class="contact">
			<div class="container">
				<div class="contact-details">
					<div class="section-header contact-head  text-center">
						<h2 id=3>contact us</h2>
						<p>
							
						</p>
					</div><!--/.section-header-->
					<div class="contact-content">
						<div class="row">
							<div class="col-sm-offset-1 col-sm-5">
								<div class="single-contact-box">
									<div class="contact-right">
										<div class="contact-adress">
											<div class="contact-office-address">
												<h3 >contact info</h3>
												<p>
													18/25, Welyaya Rd, Navinna, Maharagama
												</p>
												<div class="contact-online-address">
													<div class="single-online-address">
														<i class="fa fa-phone"></i>
														+11253678958
													</div><!--/.single-online-address-->
													
													<div class="single-online-address">
														<i class="fa fa-envelope-o"></i>
														<span>cinnamonway@mail.com</span>
													</div><!--/.single-online-address-->
												</div><!--/.contact-online-address-->
											</div><!--/.contact-office-address-->
											<div class="contact-office-address">
												
												<div class="contact-icon">
													<ul>
														
													</ul><!--/ul-->
												</div><!--/.contact-icon-->
											</div><!--/.contact-office-address-->
											
										</div><!--/.contact-address-->
									</div><!--/.contact-right-->
								</div><!--/.single-contact-box-->
							</div><!--/.col-->
							<div class="col-sm-5">
								<div class="single-contact-box">
									<div class="contact-form">
										<h3>Your Feedback</h3>
										<form action = "index.php" method= "POST" > 
											<div class="row">
												<div class="col-sm-6 col-xs-12">
													<div class="form-group">
													  <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname">
													</div><!--/.form-group-->
												</div><!--/.col-->
												<div class="col-sm-6 col-xs-12">
													<div class="form-group">
													  <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
													</div><!--/.form-group-->
												</div><!--/.col-->
											</div><!--/.row-->
											<div class="row">
												<div class="col-sm-6 col-xs-12">
													<div class="form-group">
														<input type="email" class="form-control" id="email" placeholder="Email" name="email">
													</div><!--/.form-group-->
												</div><!--/.col-->
												<div class="col-sm-6 col-xs-12">
													<div class="form-group">
														<input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
													</div><!--/.form-group-->
												</div><!--/.col-->
											</div><!--/.row-->
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<textarea class="form-control" rows="7" id="comment" name ="message" placeholder="Message" ></textarea>
													</div><!--/.form-group-->
												</div><!--/.col-->
											</div><!--/.row-->
											<div class="row">
												<div class="col-sm-12">
													<div class="single-contact-btn pull-right">
														<center>
														<input type = "submit" value = "Submit" name="fsubmit" class="btn btn-warning">
														</center>
	
													<!--button class="contact-btn" type="button" value= "fsubmit" name="fsubmit">Submit/button-->
													</div><!--/.single-single-contact-btn-->
												</div><!--/.col-->
											</div>
											<!--/.row-->
										</form><!--/form-->
									</div><!--/.contact-form-->
								</div><!--/.single-contact-box-->
							</div><!--/.col-->
						</div><!--/.row-->
					</div><!--/.contact-content-->
				</div><!--/.contact-details-->
			</div><!--/.container-->

		</section><!--/.contact-->

		
		
		<hm-footer start>
		<section class="hm-footer">
			<div class="container">
				<div class="hm-footer-details">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="hm-footer-widget">
								<div class="hm-foot-title ">
									<div class="logo">
										<a href="index.php">
											<!--img src="assets/images/logo/logo.png" alt="logo"/-->
										</a>
									</div><!-- /.logo-->
								</div><!--/.hm-foot-title-->
								<div class="hm-foot-para">
									<p>
										
									</p>
								</div><!--/.hm-foot-para-->
								<div class="hm-foot-icon">
									<ul>
										
									</ul><!--/ul-->
								</div><!--/.hm-foot-icon-->
							</div><!--/.hm-footer-widget-->
						</div><!--/.col-->
						<!--div class=" col-md-2 col-sm-6 col-xs-12"-->
							<div class="hm-footer-widget">
								<div class="hm-foot-title">
								<!--h4>Useful Links</h4-->
								</div><!--/.hm-foot-title-->
								<div class="footer-menu ">	  
									<!--ul class=""-->
								<img src="assets/images/banner/logo 4.png" alt="logo"/>

								<div class="links">
									<ul>
									<li><a href="#">Home</a></li>
									<li><a href="#">Order</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Contact</a></li>
								</ul>
								</div> 
								


									</ul>
								</div><!-- /.footer-menu-->
							</div><!--/.hm-footer-widget-->
						</div><!--/.col-->
						
						















		<hm-footer-details-->
		<!--hm-footer end-->
		
		<!-- footer-copyright start -->
		<footer class="footer-copyright">
			<div class="container">
				<div class="row">
					<!--div class="col-sm-7"-->
						<div class="foot-copyright pull-right">
							<p align="right">
								&copy; All Rights Reserved. Designed and Developed by
							 	<a href="https://www.themesine.com">@CinnamonWay (PVT).Ltd</a>
							</p>
						</div><!--/.foot-copyright-->
					</div><!--/.col-->
					<div class="col-sm-5">
						<div class="foot-menu pull-right
						">	  
							<ul>
								
							</ul>
						</div><!-- /.foot-menu-->
					</div><!--/.col-->
				</div><!--/.row-->
				<div id="scroll-Top">
					<i class="fa fa-angle-double-up return-to-top" id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div><!--/.scroll-Top-->
			</div><!-- /.container-->

		</footer><!-- /.footer-copyright-->
		<!-- footer-copyright end -->



		<!-- jaquery link -->

		<script src="assets/js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        
        <!--modernizr.min.js-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		
		<!--bootstrap.min.js-->
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>
		
		<!-- for manu -->
		<script src="assets/js/jquery.hc-sticky.min.js" type="text/javascript"></script>

		
		<!-- vedio player js -->
		<script src="assets/js/jquery.magnific-popup.min.js"></script>


		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

        <!--owl.carousel.js-->
        <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
		
		<!-- counter js -->
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/waypoints.min.js"></script>
		
        <!--Custom JS-->
        <script type="text/javascript" src="assets/js/jak-menusearch.js"></script>
        <script type="text/javascript" src="assets/js/custom.js"></script>
		

    </body>
	
</html>



