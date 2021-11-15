<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>ArmstrongGlobals</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			
			<link rel="stylesheet" href="{{ asset('vendor/adminlte/bootstrap/css/linearicons.css') }}">
			<link rel="stylesheet" href="{{ asset('vendor/adminlte/bootstrap/css/font-awesome.min.css') }}">
			<link rel="stylesheet" href="{{ asset('vendor/adminlte/bootstrap/css/bootstrap.css') }}">
			<link rel="stylesheet" href="{{ asset('vendor/adminlte/bootstrap/css/magnific-popup.css') }}">
			<link rel="stylesheet" href="{{ asset('vendor/adminlte/bootstrap/css/nice-select.css') }}">
			<link rel="stylesheet" href="{{ asset('vendor/adminlte/bootstrap/css/animate.min.css') }}">
			<link rel="stylesheet" href="{{ asset('vendor/adminlte/bootstrap/css/owl.carousel.css') }}">
			<link rel="stylesheet" href="{{ asset('vendor/adminlte/bootstrap/css/main.css') }}">
			<link rel="stylesheet" href="{{ asset('vendor/adminlte/css/modal.css') }}">
			<link rel="stylesheet" href="{{ asset('vendor/sweetalert-master/dist/sweetalert.css') }}">
			<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
			<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

			<!-- <link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css"> -->
			
	</head>
		<body>

			<header id="header" id="home">
			<div class="container">
				<div class="row align-items-center justify-content-between d-flex">
					<div id="logo">
					
					<a href="{{url('/')}}"><img src="{{ asset('img/logo.png')}}" alt="" title="" style="height:30px;"/></a>
					</div>
					<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li class="menu-active"><a href="#home">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#price">Trainings</a></li>
						<li><a href="#fact">Fact</a></li>
						<!-- <li><a href="#price">Price</a></li> -->
						<li><a href="#course">Tools</a></li>
						<!-- <li class="menu-has-children"><a href="">Pages</a>
						<ul> -->
							<li><a href="#footer">Contact</a></li>
							<li>
								<a href="{{url('/register')}}">Register 
								</a>
							</li>
						<!-- </ul>
						</li> -->
					</ul>
					</nav><!-- #nav-menu-container -->		    		
				</div>
			</div>
			</header><!-- #header -->
			<!-- @if (Session::has('sweet_alert.alert'))
				<script>
					swal({!! Session::get('sweet_alert.alert') !!});
				</script>
			@endif -->

			<!-- start banner Area -->
			<section class="banner-area" id="home" style="background-color: #87CEEB">	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<div class="banner-content col-lg-7">
						<h1 class=" text-uppercase" style="color:#fff; text-align:left">ARM-STRONG GLOBAL SERVICES</h1>
						<p class="pt-20 pb-20" style="text-color:#FFD700">
							we bring you top-class training and consultations...
						</p>
							<h5 class="text-white">Some of our Training(s) are:</h5>
							<h4 class="text-uppercase">
								<p id="project-titles" style="color:cyan;">	</p> <!-- displays projects title-->			
							</h4>
							
							<a href="#price" class="primary-btn text-uppercase">click here to read more!</a>
						</div>
						<div class="col-lg-5 banner-right">
							<img class="img-fluid" src="{{asset('img/header-img.png')}}" alt="">
						</div>												
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start about Area -->
			<section class="section-gap info-area" id="about">
				<div class="container">				
					<div class="single-info row mt-40 align-items-center">
						<div class="col-lg-6 col-md-12 text-center no-padding info-left">
							<div class="info-thumb">
								<img src="{{ asset('img/about-img.jpg')}}" class="img-fluid info-img" alt="">
							</div>
						</div>
						<div class="col-lg-6 col-md-12 no-padding info-rigth">
							<div class="info-content">
								<h3 class="pb-30">Amazon Royal Matrix Strong Global Services</h3>
								<p>
									<b>ARM-STRONG GLOBAL SERVICES</b> was incorporated by the Corporate Affairs Commission, CAC in the year 2020 under the company and allied matters act 1990 of the Federal Republic of Nigeria.
									The company has its headquarters in Jos, Plateau State, Nigeria.
									<br>
									<br>
									VISION: " To be a result oriented leading and multifaceted global center for service delivery with core values anchored on excellence "
									<br>
									<br>
									MISSION: " By exhibiting a competent professional value offer anchored on team working spirit that provides a competitive advantage over strategic issues that guarantee a continuous lasting solution to constantly emerging challenges of the contemporary society"

								<p>
									SERVICES: Management & Leadership consultancy, brand promotion, project management & evaluation, supplies & logistics, agro-business, mining and general contractors.								<br>
								</p>
								<br>
								<img src="{{ asset('img/signature.png')}}" alt="">
								</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End about Area -->

			<!-- Start Projects Materials Arear-->
			<!-- Start price Area -->
			<section class="price-area section-gap" id="price">
				<!-- <div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Purchase whatever you want</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="col-lg-4">
							<div class="single-price no-padding">
								<div class="price-top">
									<h4>PDF</h4>
								</div>
								<p>
									Who are in extremely love with <br>
									eco friendly system.
								</p>
								<div class="price-bottom">
									<h1><span>$</span> 79.99</h1>
									<a href="#" class="primary-btn header-btn">Purchase Now</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price no-padding">
								<div class="price-top">
									<h4>E-Book</h4>
								</div>
								<p>
									Who are in extremely love with <br>
									eco friendly system.
								</p>
								<div class="price-bottom">
									<h1><span>$</span> 99.99</h1>
									<a href="#" class="primary-btn header-btn">Purchase Now</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-price no-padding">
								<div class="price-top">
									<h4>Print Copy</h4>
								</div>
								<p>
									Who are in extremely love with <br>
									eco friendly system.
								</p>
								<div class="price-bottom">
									<h1><span>$</span> 59.99</h1>
									<a href="#" class="primary-btn">Purchase Now</a>
								</div>
							</div>				
						</div>								
					</div>
				</div>	 -->
				<div class="container">				
					<div class="single-info row mt-40 align-items-center">
						<div class="col-md-12">
							<h2>Welcome to our training outlet</h2>
							<p>Click on the view button to paruz our rich project summary. You can place an order and you get a download link sent to you on the go...</p>

							<hr>
							@if(Session::has('downloadLink'))
								<!-- <meta http-equiv="refresh" content="5;url={{ Session::get('downloadLink') }}"> -->
								<div class="col-md-8" id="downloadArea">
									<p id="down-Link" style="color:red;"><h2 style="color:red;">Click on the link below to download project</h2></p >
									
									<hr>
									<?php  $link = '/download/' . Session::get('downloadLink'); $fileName = Session::get('downloadLink');?>
									<div>
										<span>
										<p style="text-slign: center;">
											<a href="{{ url($link)  }}" target="_blank"> {{$fileName}}</a>
										</p >
										</span>
										<input type="hidden" name="checker" id="checker" value={{$fileName}}>
									</div>
								</div>
							@else
								<input type="hidden" name="checker" id="checker" value="">
							@endif
							<div class="box-body">
								<div class="">
								<table id="projects" name="projects" class="table table-bordered table-striped">
									<thead>
									<tr>
										<th>S/N</th>
										<th> Title</th>
										<th> Price</th>
										<!-- <th>Date Upladed</th> -->
										<th>View</th>
									</tr>
									</thead>

									<tbody>
									<?php $sn=1; ?>
									@foreach($projects as $project)
										<tr class="item{{$project->id}}">
											<td>{{$sn++}}</td>
											<td>{{$project->title}}</td>
											<td><span>&#8358;</span>{{$project->price}}</td>
											<!-- <td>{{$project->created_at}}</td> -->
											<td>
												<a href="#myModal" class="open-myModal btn btn-primary btn-sm" data-toggle="modal" data-title="{{$project->title }}" data-abstract="{{$project->abstract}}" data-id="{{$project->id}}" data-price="{{$project->price}}">Summary</a>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
								</div>
								<!--Download Link Div-->
								<div id="download-link">
										
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- End price Area -->
			<!-- <section class="project-area" id="project">
				<div class="container">				
					<div class="single-info row mt-40 align-items-center">
						<div class="col-md-12">
							<h2>Welcome to our projects Bank</h2>
							<p>Click on the view button to paruz our rich project summary. You can place an order and you get a download link sent to you on the go...</p>

							<hr>
							@if(Session::has('downloadLink'))
								<div class="col-md-8" id="downloadArea">
									<p id="down-Link" style="color:red;"><h2 style="color:red;">Click on the link below to download project</h2></p >
									
									<hr>
									<?php  $link = '/download/' . Session::get('downloadLink'); $fileName = Session::get('downloadLink');?>
									<div>
										<span>
										<p style="text-slign: center;">
											<a href="{{ url($link)  }}" target="_blank"> {{$fileName}}</a>
										</p >
										</span>
										<input type="hidden" name="checker" id="checker" value={{$fileName}}>
									</div>
								</div>
							@else
								<input type="hidden" name="checker" id="checker" value="">
							@endif
							<div class="box-body">
								<div class="">
								<table id="projects" name="projects" class="table table-bordered table-striped">
									<thead>
									<tr>
										<th>S/N</th>
										<th>Project Title</th>
										<th>Project Price</th>
										<th>View</th>
									</tr>
									</thead>

									<tbody>
									<?php $sn=1; ?>
									@foreach($projects as $project)
										<tr class="item{{$project->id}}">
											<td>{{$sn++}}</td>
											<td>{{$project->title}}</td>
											<td><span>&#8358;</span>{{$project->price}}</td>
											<td>
												<a href="#myModal" class="open-myModal btn btn-success btn-sm" data-toggle="modal" data-title="{{$project->title }}" data-abstract="{{$project->abstract}}" data-id="{{$project->id}}" data-price="{{$project->price}}">abstract</a>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
								</div>
								Download Link Div-->
								<div id="download-link">
										
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</section> 
			<!-- End Start Projects Area -->
		<br /><br /><br />

			<!-- Start fact Area -->
			<section class="fact-area relative section-gap" id="fact">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-40 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Some Features that Made us Unique</h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
				</div>	
			</section>
			<!-- End fact Area -->
			
			<!-- Start counter Area -->
			<section class="counter-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="single-counter">
								<h1 class="counter">1536</h1>
								<p>Happy Clients</p>								
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-counter">
								<h1 class="counter">1784</h1>
								<p>Total Projects</p>								
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-counter">
								<h1 class="counter">1059</h1>
								<p>Conducted Researches</p>								
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-counter">
								<h1 class="counter">1239</h1>
								<p>Consaultations</p>								
							</div>
						</div>												
					</div>
				</div>	
			</section>
			<!-- end counter Area -->
			
			
			
			<!-- Start course Area -->
			<section class="course-area section-gap" id="course">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10">Training Tools</h1>
								<p>guaranttee your quality and beffiting service...</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-course-carusel">
							<div class="single-course item">
								<img class="img-fluid" src="{{asset('img/spss.jpg')}}" alt="">
								<p class="sale-btn">hire us</p>
								<div class="details">
									<a href="#"><h4>Breakthrough Thinking <span class="price float-right">$25</span></h4></a>	
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
									</p>
								</div>
							</div>
							<div class="single-course item">
								<img class="img-fluid" src="{{ asset('img/stata1.jpg')}}" alt="">
								<p class="sale-btn">hire us</p>
								<div class="details">
									<a href="#"><h4>Breakthrough Thinking <span class="price float-right">$25</span></h4></a>	
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
									</p>
								</div>
							</div>
							<div class="single-course item">
								<img class="img-fluid" src="{{ asset('img/eviews.jpg')}}" alt="">
								<p class="sale-btn">hire us</p>
								<div class="details">
									<a href="#"><h4>Breakthrough Thinking <span class="price float-right">$25</span></h4></a>	
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
									</p>
								</div>
							</div>								
						</div>											
					</div>
				</div>	
			</section>
			<!-- End course Area -->
			
			<!-- Start call-to-action Area -->
			<section class="call-to-action-area section-gap">
				<div class="container">
					<div class="row justify-content-center top">
						<div class="col-lg-12">
							<h1 class="text-white text-center">Announcements</h1>
							<p class="text-white text-center mt-30">
							</p>							
						</div>
					</div>
					<div class="row justify-content-center d-flex">	
						<div class="download-button d-flex flex-row justify-content-center mt-30">		
							<div class="buttons flex-row d-flex">
								<i class="fa fa-apple" aria-hidden="true"></i>
								<div class="desc">
										<p>
											<!-- <span>Available</span> <br>
											on App Store -->
											ARM-STRONG GLOBAL SERVICES is the consultant appointed by the Plateau State Government through the supervising Ministry of Education to execute a capacity development workshop for secondary schools in Plateau State at the commencement of the 2021/2022 academic session between November and December.

											The capacity development workshop is a one day intensive training exclusive for management cadre staff of secondary schools in Plateau State. Participants are comprised of minimum of three and maximum of five members from all schools in the state, both public and private. 
											The training draws eligible participants from any management position of Principal, Vice principal academic, Vice Principal admin, Dean of studies, Bursar, Heads of Departments and the Exam Officer of secondary schools. 

											The seventeen local government areas of the state have been grouped to five for the training sessions holding on different dates as approved by the State Ministry of Education.
											The grouping has the following composition.

											Group A: Jos North, Bassa and Jos East local government areas to hold on Tuesday, 23rd November, 2021 in Jos metropolis.

											Group B: Jos South, Riyom, Barkin Ladi and Bokkos local government areas to hold on Thursday, 25th November 2021 in Jos metropolis.

											Group C: Mangu, Pankshin, Kanke and Kanam local government  areas to hold on Tuesday, 30th November, 2021 in Pankshin town.

											Group D: Wase, Langtang North and Langtang south to hold on Thursday, 2nd December, 2021 in Langtang North.

											Group E: Mikang, Shendam and Qu'anpan local government areas to hold on Tuesday, 7th December, 2021 in Shendam town.

										</p>
								</div>
							</div>
							<div class="buttons flex-row d-flex">
								<i class="fa fa-android" aria-hidden="true"></i>
								<div class="desc">
									<a href="#">
										<p>
											<!-- <span>Available</span> <br>
											on Play Store -->
											The capacity development workshop shall be a one day training session from 9:00am to 4:00pm.
												Participants shall be provided with the following:
												i: tea breakfast
												ii: lunch
												iii: souvenirs.
												iv: certificate of participation.

												Arrival and registration commences concurrently with tea break from 8:30am.
												All covid-19 protocols shall strictly be observed hence all prospective participants and to come with face mask each.
												All resource persons for the workshop are professional and seasoned experts of high repute.
												</p>
									</a>
								</div>
							</div>
							
						</div>						
					</div>
				</div>	
			</section>
			<!-- End call-to-action Area -->

			<!-- Start testomial Area -->
			<section class="testomial-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Editors-in-Chief </h1>
								<p>Who are in extremely love with eco friendly system.</p>
							</div>
						</div>
					</div>						
					<div class="row">
						<div class="active-tstimonial-carusel">
							<div class="single-testimonial item">
								<img class="mx-auto" src="{{ asset('img/t1.png')}}" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>
							<div class="single-testimonial item">
								<img class="mx-auto" src="{{ asset('img/t2.png')}}" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>
							<div class="single-testimonial item">
								<img class="mx-auto" src="{{ asset('img/t3.png')}}" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>	
							<div class="single-testimonial item">
								<img class="mx-auto" src="{{ asset('img/t1.png')}}" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>
							<div class="single-testimonial item">
								<img class="mx-auto" src="{{ asset('img/t2.png')}}" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>
							<div class="single-testimonial item">
								<img class="mx-auto" src="{{ asset('img/t3.png')}}" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>															
							<div class="single-testimonial item">
								<img class="mx-auto" src="{{ asset('img/t1.png')}}" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>
							<div class="single-testimonial item">
								<img class="mx-auto" src="{{ asset('img/t2.png')}}" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>
							<div class="single-testimonial item">
								<img class="mx-auto" src="{{ asset('img/t3.png')}}" alt="">
								<p class="desc">
									Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
								</p>
								<h4>Mark Alviro Wiens</h4>
								<p>
									CEO at Google
								</p>
							</div>														
						</div>
					</div>
				</div>	
			</section>
			<!-- End testomial Area -->
			

			<!-- start footer Area -->		
			<footer class="footer-area section-gap" id="footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6 style="color:white">About Us</h6>
								<p style="color:#777777;">
									At BRAMS we:
									<ol>
										<li style="color:#777777;">Conduct Academic Research</li>
										<li style="color:#777777;">Do Data Analysis</li>
										<li style="color:#777777;">Conduct Survey management, data collection and presentation</li>
										<li style="color:#777777;">Conduct Social research etc.</li>
									</ol>
								</p>
								<p class="footer-text" style="color:#777777;">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								</p>								
							</div>
						</div>
						<div class="col-lg-5  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6 style="color:white;">Contact Us@</h6>
								<p style="color:#777777;">No 54KRK off Liberty Dam Road, Jos.</p>
								<p style="color:#777777;">08037206272.</p>
								<p style="color:#777777;">E-mail: armstrongco51@gmail.com.</p>
								

								<div class="" id="contact-us">
								
									<form id="contactForm" action="javascript:;" onsubmit="myFunction(this)" method="#" class="form-inline" role="form">
										
										<div class="mt-10 col-md-12">
											<input type="text" name="contact_email" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" required="" class="form-control">
										</div>

										<div class="mt-10 col-md-12">
											<input type="text" name="contact_subject" placeholder="Message Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message Subject'" required="" class="form-control">
										</div>

										<div class="mt-10 col-md-10">
											<textarea class="single-textarea" name="contact_message" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required="" class="form-control"></textarea>
										</div>
										<div class="mt-10 col-md-10">
										<button type="submit" id="contact-submit-btn" class="click-btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
										<!-- <button id="submit" type="Submit" class="btn btn-primary">Send Message</button> -->
										</div>
			                            	
			                            	<!-- <div style="position: absolute; left: -5000px;">
												<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
											</div> -->

										<div class="info"></div>
										{{ csrf_field() }}
									</form>
								</div>
							</div>
						</div>						
						<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6 style="color:white">Follow Us</h6>
								<p style="color:#777777;">Let us be social</p>
								<div class="footer-social d-flex align-items-center">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>							
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->	

			<!-- Modal Area-->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<h5 class="modal-title"></h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						
						<div class="modal-body">
						<div >
							
						</div>

						<!-- form -->
						<form id="form-horizontal" role="form" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
							<label for="price-text" class="control-label">Abstract:</label>
							<textarea class="form-control" name="message" rows="8" id="message" readonly=""></textarea>
							</div>
							<div class="client-info">
								<div class="form-group" id="form-horizontal">
								<label for="recipient-name" class="control-label">Phone Number:</label>
								<input type="text" class="form-control" name="phone" id="phone" required>
								</div>
								<div class="form-group">
								<label for="recipient-name" class="control-label">Email:</label>
								<input type="text" class="form-control" name="email" id="email" required>
								</div>
							</div>

							<input type="hidden" name="id" id="id" value="">
							<input type="hidden" name="Price" id="Price" value="">
							<input type="hidden" name="token" id="token" value="{{csrf_token()}}">
						</form>
						
						</div>
						<div class="modal-footer">
						<!-- <button type="button" class="btn actionBtn" id="actionBtn" >
							<span id="footer_action_button" class="glyphicon"></span>
						</button> -->
						<button type="button" class="btn btn-warning" data-dismiss="modal">
							<span class="glyphicon glyphicon-remove"></span>Close
						</button>
						</div>
					</div>
				</div>
			</div>
			<!--End Modal Area-->
			
			<!--check-out-pay Modal-->
			<div class="modal fade" id="check-out-Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Check Out</h4>
                </div>
				<div class="modal-dialog">
					<div class="modal-content load_modal"></div>
					
				</div>
			</div>
			<!-- <div class="modal fade text-center py-5"  id="check-out-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-md" role="document">
					<div class="modal-content">
						<div class="modal-body">
							<div class="top-strip"></div>
							<a class="h2" href="https://www.fiverr.com/sunlimetech/design-and-fix-your-bootstrap-4-issues" target="_blank">Sunlimetech</a>
							<h3 class="pt-5 mb-0 text-secondary">Newsletter</h3>
							<p class="pb-1 text-muted"><small>Sign up to update with our latest news and products.</small></p>
							<form>
								<div class="input-group mb-3 w-75 mx-auto">
								<input type="email" class="form-control" placeholder="sunlimetech@gmail.com" aria-label="Recipient's username" aria-describedby="button-addon2" required>
								<div class="input-group-append">
									<button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-paper-plane"></i></button>
								</div>
								</div>
							</form>
							<p class="pb-1 text-muted"><small>Your email is safe with us. We won't spam.</small></p>
							<div class="bottom-strip"></div>
						</div>
					</div>
				</div>
			</div> -->
			<!--check-out-pay Modal-->

			
			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/main.js') }}"></script>

			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/vendor/jquery-2.2.4.min.js') }}"></script>
			<!-- <script src="{{ asset ('/vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script> -->
			<!-- <script src="js/vendor/jquery-2.2.4.min.js"></script> -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/vendor/bootstrap.min.js') }}"></script>
			<!-- <script src="js/vendor/bootstrap.min.js"></script>			 -->
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/easing.min.js') }}"></script>
			<!-- <script src="js/easing.min.js"></script>			 -->
			<!-- <script src="js/hoverIntent.js"></script> -->
			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/hoverIntent.js') }}"></script>
			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/superfish.min.js') }}"></script>
			<!-- <script src="js/superfish.min.js"></script>	 -->
			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/jquery.ajaxchimp.min.js') }}"></script>
			<!-- <script src="js/jquery.ajaxchimp.min.js"></script> -->
			<!-- <script src="js/jquery.magnific-popup.min.js"></script>	 -->
			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/jquery.magnific-popup.min.js') }}"></script>
			<!-- <script src="js/owl.carousel.min.js"></script>		 -->
			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/owl.carousel.min.js') }}"></script>	
			<!-- <script src="js/jquery.sticky.js"></script> -->
			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/jquery.sticky.js') }}"></script>	
			<!-- <script src="js/jquery.nice-select.min.js"></script> -->
			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/jquery.nice-select.min.js') }}"></script>	
			<!-- <script src="js/parallax.min.js"></script> -->
			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/parallax.min.js') }}"></script>	
			<!-- <script src="js/waypoints.min.js"></script> -->
			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/waypoints.min.js') }}"></script>	
			<!-- <script src="js/jquery.counterup.min.js"></script>	 -->
			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/jquery.counterup.min.js') }}"></script>			
			<!-- <script src="js/mail-script.js"></script> -->
			<script src="{{ asset ('/vendor/adminlte/plugins/jQuery/mail-script.js') }}"></script>	
			<script src="{{ asset ('/vendor/sweetalert-master/dist/sweetalert.min.js') }}"></script>
			@include('sweet::alert')
			<!-- <script src="js/main.js"></script> -->
			

			<script type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/jquery.dataTables.min.js')}}"></script>

			<script type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/dataTables.bootstrap.min.js')}}"></script>
			<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
			<script>
				$(document).ready(function(){
					var url = '{{url("show-project")}}';
					var checker = $('#checker').val();
					var downloadArea = $('#downloadArea');
					
					if (checker != ""){
						swal("Good!", "Please click on the link to download project", "info");
							$('html, body').animate({
							scrollTop: $(downloadArea).offset().top
						}, 'slow');
					}
					
					//Show dataTable
					$(function(){
					$('#projects').DataTable({
						select:true,
						});
					});

					function nextMsg() {
						if (titlesMesg.length == 0) {
							// once there is no more message, do whatever you want
							// alert("redirecting");
						} else {
							// change content of message, fade in, wait, fade out and continue with next message
							$('#project-titles').html(titlesMesg.pop()).fadeIn(500).delay(2000).fadeOut(500, nextMsg);
						}
					};
					//Get all  projects names
					var titleURL =  '{{url("get-all-projects-names")}}';
					 var titlesMesg = [''];
					$.get(titleURL, function(data){

						for(i=0; i<data.length; i++){
							titlesMesg.push(data[i].title);
						}
					});

					titlesMesg.reverse();
					$('#project-titles').hide();
					nextMsg();

					// $('#myModal').on('hidden.bs.modal', function () {
					// location.reload();
					// });
					//show modal
					$(document).on("click", ".open-myModal", function (e) {
						e.preventDefault();
						$('#footer_action_button').text('Order');
						$('#footer_action_button').addClass('glyphicon-shopping-cart');

						$('.actionBtn').addClass('btn-success');
						$('.actionBtn').addClass('order');       
						$('.delete-content').hide();
						$('#form-horizontal').show();
						$('.client-info').hide();

						var id = $(this).data('id');
						
						//Get project detail and load the modal
						$.get(url + '/' + id, function(data){

						// console.log(data.price);
						$(".modal-title").text( data.title );
						$("#message").text( data.abstract );
						$("#Price").val( data.price );
						$("#id").val( data.id );
						//console.log($("#price").val());
						});


						$(".modal-footer").on('click', '.order', function(){
							$('#form-horizontal').show();
							$('.client-info').show();
							$('#footer_action_button').text('Purchase');
							$('#footer_action_button').addClass('glyphicon-glyphicon-usd');
							// $('#footer_action_button').addClass('glyphicon glyphicon-usd');
							$('.actionBtn').addClass('btn-success');
							$('.actionBtn').addClass('pay');       
							$('.delete-content').hide();
							$('#form-horizontal').show();
						});

						$(".modal-footer").on("click", ".pay", function () {

							var email = $('#email').val();
							var formData = new $("#form-horizontal").serialize();
							//console.log(formData);
							if(email != ""){
								$.ajax({
									url:'{{route("save-buyer-contacts")}}',
									type:'POST',
									headers: {
										'X-CSRF-TOKEN': $('input[name=_token]').val()
									},
									data: formData,

									success:function(data){
										 alert(data);
										var transact_id = data;
										$('#form-horizontal')[0].reset();
										$('#myModal').modal('hide');
										
										$.get( "{{ url('services/check-out')}}" + "/"+ id + "/" + email + '/' + transact_id, function( data ) {
											 //console.log(data.buyer);
											$('#check-out-Modal').modal();
											$('#check-out-Modal').on('shown.bs.modal', function(){
												$('#check-out-Modal .load_modal').html(data.view);
												$('#project-title').text(data.buyer.title);
												$('#amount').val(data.buyer.price * 100);
												$('#orderID').val(data.buyer.id);
												$('#buyer-email').val(data.buyer.email);
												//$('#check-out-Modal .modal-body').data(data.buyer.title);

												//Update buyer infor on transaction_tbl with transaction
												var formData = new $("#check-out-form").serialize();
												//console.log(formData);
												$.ajax({
													url:'{{route("update-buyer-contacts-ref")}}',
													type:'POST',
													headers: {
														'X-CSRF-TOKEN': $('input[name=_token]').val()
													},
													data: formData,

													success:function(data){
														//console.log(data);
													},
												});
											});
											
											$('#check-out-Modal').on('hidden.bs.modal', function(){
												$('#check-out-Modal .modal-body').data(data.buyer.title);
											});
										});
										//window.location.href = "{{ url('services/check-out')}}" + "/"+ id + "/" + email + '/' + transact_id;
									},

								});
								
							}//End if condition
							
						});
					});

					//redirect to paystack payment gateway
					$(document).on("click", ".proceed-pay", function(e) {
						// alert("Yippi!!!");
						// var formData = new $("#check-out-form").serialize();
						$("#check-out-form").submit();

					});

					//redirect to paystack payment gateway
					// $(document).on("click", "#contact-submit-btn", function(e) {
					// 	//alert('here!');
					// 	var ContactFormData = new $("#contactForm").serialize();
					// 	console.log(ContactFormData);
					// 	$.ajax({
					// 		url:'{{ route("send-message")}}',
					// 		type:'POST',
							
					// 		data: ContactFormData,

					// 		success:function(data){
					// 			alert('here!');
					// 			console.log(data);
					// 		},
					// 	});
					// });

					
				});
				function myFunction(){
						var ContactFormData = new $("#contactForm").serialize();
						//console.log(ContactFormData);
						$.ajax({
							url:'{{ (route("send-message")) }}',
							type:'POST',
							
							data: ContactFormData,

							success:function(data){
								swal("Good!", "Your message has been successfully sent. check your email after 24 hours for reply", "success");
							},
							error: function(XMLHttpRequest, textStatus, errorThrown) {
								swal("Oops!", "There was an error sending your message, please try again", "success");;
							} 
						});
					}  
			</script>
	</body>
</html>



