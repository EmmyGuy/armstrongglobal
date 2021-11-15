@extends('web.template')
    
    @section('content')
        <!-- Header Carousel -->
        <header id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <!-- <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');">
                        
                    </div> -->
                    
                    <img src="http://localhost/data_world/resources/assets/images/researchpad.jpeg" alt="" style="width:1200px;height:260px; display: block; margin-left: auto;margin-right: auto;">
                    <div class="carousel-caption">
                        <h2></h2>
                    </div>
                </div>
                <div class="item">
                    <!-- <div class="fill" style="background-image:url('http://placehold.it/1900x700text=Slide Two');"></div> -->
                    <img src="http://localhost/data_world/resources/assets/images/images.png" alt="" style="width:1200px;height:260px; display: block; margin-left: auto;margin-right: auto;">
                    <div class="carousel-caption" style="position:absolute; top: 48%;left: 20%;">
                        <h4 style="color: black;  ">We guaratee your smooth transition through  academics...</h2>
                    </div>
                </div>
                <div class="item">
                     <img src="http://localhost/data_world/resources/assets/images/acad.jpg" alt="" style="width:1200px;height:260px; display: block; margin-left: auto;margin-right: auto; margin-top: auto; margin-bottom: ">
                    <div class="carousel-caption">
                        <h2></h2>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="icon-next"></span>
            </a>
        </header>

        <!-- Page Content -->
        <div class="container">

            <!-- Marketing Icons Section -->
            <div class="row" >
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to ResearchPAD
                    </h1>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-success" style="background-color: transparent;">
                        <div class="panel-heading">
                            <h4><i class="fa fa-fw fa-check"></i> Project Materials Conner</h4>
                        </div>
                        <div class="panel-body" >
                            <p>Browse through our hundreds of topics with full materials. The success of your next research is one click ahead!</p>
                            <a href="{{url('/services/research')}}" class="btn btn-warning">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-success" style="background-color: transparent;">
                        <div class="panel-heading">
                            <h4><i class="fa fa-fw fa-gift"></i> Data Analysis</h4>
                        </div>
                        <div class="panel-body" >
                            <p>SPSS, e-views, starter, excel, etc</p>
                            <a href="#" class="btn btn-warning">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-success" style="background-color: transparent;">
                        <div class="panel-heading">
                            <h4><i class="fa fa-fw fa-compass">e-Survey</i></h4>
                        </div>
                        <div class="panel-body">
                            <p>survey monkey, dooblo, </p>
                            <a href="#" class="btn btn-warning">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Portfolio Section -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Portfolio Heading</h2>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                </div>
                <div class="col-md-4 col-sm-6">
                    <a href="portfolio-item.html">
                        <img class="img-responsive img-portfolio img-hover" src="http://placehold.it/700x450" alt="">
                    </a>
                </div>
            </div>
            <!-- /.row -->

            <!-- Features Section -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">ResearchPAD Features</h2>
                </div>
                <div class="col-md-6">
                    <p>At researchPad, we ensure:</p>
                    <ul>
                        <li><strong>A proper guidance in selecting a researchable project topic</strong>
                        </li>
                        <li>Provide relevant materials at every phase of the research</li>
                        <li>Provides consultancy services regarding the research</li>
                        <li>Fine tune your questionaires for effective hypothesis testing</li>
                        <li>Provide an e-survey system by the help of our android survey app</li>
                        <li>Analize and interpret result with SPSS, and other statistical packages</li>
                    </ul>
                    <p>We are committed to making your research a worth while exercise</p>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive" src="http://localhost/data_world/resources/assets/images/logo1.jpeg" style="width:600px;height:320px;" alt="">
                </div>
            </div>
            <!-- /.row -->

            <hr>

            <!-- Call to Action Section -->
            <div class="well">
                <div class="row">
                    <div class="col-md-8">
                        <p>Take a tour at our new servey app.</p>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-lg btn-danger btn-block" href="#">survey app</a>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Footer -->
            <!-- <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Your Website 2014</p>
                    </div>
                </div>
            </footer>
 -->
        </div>
    @endsection
    <!-- /.container -->

    <!-- jQuery -->
    <!-- <script src="js/jquery.js"></script> -->
    <script src="{{ asset ('/vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ('/vendor/adminlte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="js/bootstrap.min.js"></script> -->

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

