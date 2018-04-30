
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from sainathchillapuram.com/BS/mediplus/demos/hospital/html-fullwidth/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Oct 2017 17:57:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>{{ str_replace('_',' ',env('APP_NAME')) }}</title>

		<!-- Bootstrap -->
		<link href="{{ asset("frontsite/css/bootstrap.min.css")}}" rel="stylesheet">


		<!-- Template CSS Files  -->
		<link href="{{ asset("frontsite/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet">
		<link href="{{ asset("frontsite/js/plugins/camera/css/camera.css")}}" rel="stylesheet">
		<link href="{{ asset("frontsite/js/plugins/magnific-popup/magnific-popup.css")}}" rel="stylesheet">
		<link href="{{ asset("frontsite/css/style.css")}}" rel="stylesheet">
		<link href="{{ asset("frontsite/css/responsive.css")}}" rel="stylesheet">
		<link rel="shortcut icon" href="{{ asset("favicon.png")}}">

	</head>
	<body>
	<!-- Header Starts -->
		<header class="main-header">
		<!-- Nested Container Starts -->
			<div class="container">
			<!-- Top Bar Starts -->
				<div class="top-bar hidden-sm hidden-xs">
					<div class="row">
						<div class="col-sm-6 col-xs-12">
							<span>Bogor:</span>  Sistem pakar diagnosa penyakit mata
						</div>
						<div class="col-sm-6 col-xs-12">
							<ul class="list-unstyled list-inline">
								<li><a href="mailto:care@yourhosptialsname.com">
									<i class="fa fa-envelope-o"></i>
									endralaksmana576@gmail.com
								</a></li>
								<li><i class="fa fa-phone"></i> Tlpn : +62 896 3862 6558</li>
							</ul>
						</div>
					</div>
				</div>
			<!-- Top Bar Ends -->
			<!-- Navbar Starts -->
				<nav id="nav" class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
					<!-- Navbar Header Starts -->
						<div class="navbar-header">
						<!-- Collapse Button Starts -->
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						<!-- Collapse Button Ends -->
						<!-- Logo Starts -->
							<a href="index-2.html" class="navbar-brand">
								<i class="fa fa-heartbeat"></i>
								<small>Sistem Pakar Penyakit Mata</small>
							</a>
						<!-- Logo Ends -->
						</div>
					<!-- Navbar Header Ends -->
					<!-- Navbar Collapse Starts -->
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav navbar-right">
								<li class="active"><a href="{{ URL::to('/')}}">Home</a></li>
								<li><a href="{{ URL::to('/about')}}">About</a></li>
								<li><a href="{{ URL::to('/contact')}}">Contact</a></li>
								<li><a href="{{ URL::to('membership/') }}">Login</a></li>
							</ul>
						</div>
					<!-- Navbar Collapse Ends -->
					</div>
				</nav>
			<!-- Navbar Ends -->
			</div>
		<!-- Nested Container Ends -->
		</header>
	<!-- Header Ends -->

	<!-- Main Banner Starts -->
    <div class="main-banner five">
    <div class="container">
        <h2><span>Contact Us</span></h2>
    </div>
</div>
<!-- Main Banner Ends -->
<!-- Breadcrumb Starts -->
<div class="breadcrumb">
    <div class="container">
        <ul class="list-unstyled list-inline">
            <li><a href="index.html">Home</a></li>
            <li class="active">Contact Us</li>
        </ul>
    </div>
</div>		
<!-- Breadcrumb Ends -->
<!-- Main Container Starts -->
<div class="container main-container">
<!-- Contact Info Section Starts -->
    <div class="contact-info-box">
        <div class="row">
            <div class="col-md-5 col-xs-12 hidden-sm hidden-xs">
                <div class="box-img">
                    <img src="{{ asset('frontsite/images/contact/contact-info-box-img1.png')}}" alt="Image" />
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="info-box">
                    <h3>We'd love to hear from you</h3>
                    <h5>
                        Fusce convallis diam vitae velit tempus rutrum. Donec nisl nisl, vulputate eu sapien sed, adipiscing vehicula massa. Mauris eget commodo neque, id molestie enim.
                    </h5>
                    <div class="row">
                        <h4 class="col-sm-6 col-xs-12">Tel: 1-800-999-1234</h4>
                        <h4 class="col-sm-6 col-xs-12">Fax: 1-800-999-1234</h4>
                    </div>
                    <h4>Email: <a href="mailto:info@domainname.com">info@domainname.com</a></h4>
                </div>
            </div>
            <div class="col-md-1 col-xs-12 hidden-sm hidden-xs"></div>
        </div>
    </div>
<!-- Contact Info Section Ends -->
<!-- Contact Content Starts -->
    <div class="contact-content">
        <div class="row">
        <!-- Contact Form Starts -->
            <div class="col-sm-8 col-xs-12">
                <h3>Get in touch by filling the form below</h3>
                <div class="status alert alert-success contact-status"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
                    <div class="row">
                    <!-- Name Field Starts -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name </label>
                                <input type="text" class="form-control" name="name" id="name" required="required">
                            </div>
                        </div>
                    <!-- Name Field Ends -->
                    <!-- Email Field Starts -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email Address </label>
                                <input type="text" class="form-control" name="email" id="email" required="required">
                            </div>
                        </div>
                    <!-- Email Field Ends -->
                    <!-- Phone No Field Starts -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phoneno">Contact Number </label>
                                <input type="text" class="form-control" name="phoneno" id="phoneno" required="required">
                            </div>
                        </div>
                    <!-- Phone No Field Ends -->
                    <!-- Subject Field Starts -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subject">Subject </label>
                                <input type="text" class="form-control" name="subject" id="subject" required="required">
                            </div>
                        </div>
                    <!-- Subject Field Ends -->
                    <!-- Message Field Starts -->
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="message">Your Comments: </label>
                                <textarea class="form-control" rows="8" name="message" id="message" required="required"></textarea>
                            </div>
                        </div>
                    <!-- Message Field Ends -->
                        <div class="col-xs-12">
                            <input type="submit" class="btn btn-black text-uppercase" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        <!-- Contact Form Ends -->
        <!-- Address Starts -->
            <div class="col-sm-4 col-xs-12">
            <!-- Box #1 Starts -->
                <div class="cblock-1">
                    <span class="icon-wrap"><i class="fa fa-car"></i></span>
                    <h4>Come and Visit</h4>
                    <ul class="list-unstyled">
                        <li>#121 King Koti Street, Abids,</li>
                        <li>Victoria Apartment, Telangana, India.</li>
                        <li>001-123-456-7890</li>
                    </ul>
                </div>
            <!-- Box #1 Ends -->
            <!-- Box #2 Starts -->
                <div class="cblock-1">
                    <span class="icon-wrap red"><i class="fa fa-ambulance"></i></span>
                    <h4>Emergency Care?</h4>
                    <ul class="list-unstyled">
                        <li>If you're having a medical emergency,</li>
                        <li>do not wait to contact us.</li>
                        <li>Call 001-123-456-7890</li>
                        <li>or visit the closest emergency center.</li>
                    </ul>
                </div>
            <!-- Box #2 Ends -->
            </div>
        <!-- Address Ends -->
        </div>
    </div>
<!-- Contact Content Ends -->
</div>
<!-- Main Container Ends -->

	<!-- Footer Starts -->
		<footer class="main-footer">
		<!-- Footer Area Starts -->
			<div class="footer-area">
			<!-- Nested Container Starts -->
				<div class="container">
					<div class="row">
					<!-- Hosptial Information Starts -->
						<div class="col-md-3 col-sm-4 col-xs-12">
							<h4>Info Sistem Pakar</h4>
							<p>
								SISTEM PAKAR DIAGNOSA PENYAKIT MATA
							</p>
							<ul class="list-unstyled address-list">
								<li class="clearfix address">
									<i class="fa fa-home"></i>
									<p>
									Jl. Pala Rt 01 / Rw 01 . Kab. Bogor - 16610
									</p>
								<li class="clearfix">
									<i class="fa fa-fax"></i>
									001 - 785 987 1234
								</li>
								<li class="clearfix">
									<i class="fa fa-phone"></i>
									001 - 123 478 5987
								</li>
								<li class="clearfix">
									<i class="fa fa-envelope"></i>
									<a href="mailto:info@yourhospitalsite.com">endralaksmana576@gmail.com</a>
								</li>
							</ul>
						</div>
					<!-- Hosptial Information Ends -->
					<!-- Services Starts -->
						<div class="col-md-2 col-sm-4 col-xs-12">
							<h4>Kelinik</h4>
							<ul class="list-unstyled">
								<li><a href="http://www.bogormedicalcenter.co.id"><i class="fa fa-angle-right"></i> Bogor Medical Center</a></li>
								<li><a href="http://www.kimiafarmas.co.id"><i class="fa fa-angle-right"></i> Kelinik Kimia Farma</a></li>
								<li><a href="http://www.appleeye.co.id"><i class="fa fa-angle-right"></i> Bogor Eye Clinic</a></li>
							</ul>
						</div>
					<!-- Services Ends -->
					<!-- Twitter Starts -->
						<div class="col-md-3 col-sm-4 col-xs-12">
							<h4>Sosial Media</h4>
							<ul class="list-unstyled tweets-list">
								<li>
									<i class="fa fa-facebook"></i>
									Endera Laksmana.
									<a href="#">http://www.facebook.com</a>
								</li>
								<li>
									<i class="fa fa-instagram"></i>
									@endralaks
									<a href="https://www.instagram.com/endralaks/?hl=id">http://www.instagram.com</a>
								</li>
								<li>
									<i class="fa fa-twitter"></i>
									@endralaks
									<a href="#">http://t.co/www.twitter.com</a>
								</li>
							</ul>
						</div>
						

						
					<!-- Twitter Ends -->
					<!-- Signup Newsletter Starts -->
					<!-- Signup Newsletter Ends -->
					</div>
				</div>
			<!-- Nested Container Ends -->
			</div>
		<!-- Footer Area Ends -->
		<!-- Copyright Starts -->
			<div class="copyright">
				<div class="container clearfix">
					<p class="pull-left">
						&copy; Copyright 2015. AlL Rights Reserved By <span>Sistem Pakar</span>
					</p>
					<ul class="list-unstyled list-inline pull-right">
						<li><a href="#">Terms Of Services</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="contact.html">Contact Us</a></li>
					</ul>
				</div>
			</div>
		<!-- Copyright Ends -->
		</footer>
	<!-- Footer Ends -->
	<!-- Template JS Files -->
	<script src="{{ asset('frontsite')}}/js/jquery-1.11.3.min.js"></script>
	<script src="{{ asset('frontsite')}}/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="{{ asset('frontsite')}}/js/bootstrap.min.js"></script>
	<script src="{{ asset('frontsite')}}/js/plugins/camera/js/jquery.mobile.customized.min.js"></script>
	<script src="{{ asset('frontsite')}}/js/plugins/camera/js/jquery.easing.1.3.js"></script>
	<script src="{{ asset('frontsite')}}/js/plugins/camera/js/camera.min.js"></script>
	<script src="{{ asset('frontsite')}}/js/plugins/shuffle/jquery.shuffle.modernizr.min.js"></script>
	<script src="{{ asset('frontsite')}}/js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="{{ asset('frontsite')}}/js/custom.js"></script>
	</body>

<!-- Mirrored from sainathchillapuram.com/BS/mediplus/demos/hospital/html-fullwidth/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Oct 2017 17:57:21 GMT -->
</html>
