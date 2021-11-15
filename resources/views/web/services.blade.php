@extends('web.template')

    @section('content')
    <!-- Page Content -->
        <div class="container">

            <!-- Page Heading/Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Services
                        <small>@ reseachPAD</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{url('/topics')}}">Home</a>
                        </li>
                        <li class="active">Services</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <!-- Image Header -->
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" <img src="http://localhost/data_world/resources/assets/images/researchpad.jpeg" alt="" style="width:1200px;height:220px;" alt="">
                </div>
            </div>
            <!-- /.row -->

            <!-- Service Panels -->
            <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Services Panels</h2>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading success">
                            <span class="fa-stack fa-5x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <h4>Academic Research</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <a href="{{url('/services/research')}}" class="btn btn-danger">visit</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <span class="fa-stack fa-5x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <h4>Social research</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <a href="#" class="btn btn-danger">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <span class="fa-stack fa-5x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-support fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <h4>Survey management, data collection and presentation</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <a href="#" class="btn btn-danger">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <span class="fa-stack fa-5x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <h4>Data Analysis</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <a href="#" class="btn btn-danger">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-lg-12">
                    <h2 class="page-header">Services Panels</h2>
                </div> -->
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <span class="fa-stack fa-5x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div class="panel-body" style="background-color: transparent;">
                            <h4>Business development and branding</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <a href="#" class="btn btn-danger">Lern More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <span class="fa-stack fa-5x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <h4>Business plan and proposal design</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <a href="#" class="btn btn-danger">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <span class="fa-stack fa-5x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-support fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <h4>Training and development</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <a href="#" class="btn btn-danger">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <span class="fa-stack fa-5x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <h4>Youth empowerment trainings</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <a href="#" class="btn btn-danger">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Tabs -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Service Tabs</h2>
                </div>
                <div class="col-lg-12">

                    <ul id="myTab" class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i> Service One</a>
                        </li>
                        <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-car"></i> Service Two</a>
                        </li>
                        <li class=""><a href="#service-three" data-toggle="tab"><i class="fa fa-support"></i> Service Three</a>
                        </li>
                        <li class=""><a href="#service-four" data-toggle="tab"><i class="fa fa-database"></i> Service Four</a>
                        </li>
                    </ul>

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="service-one">
                            <h4>Service One</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                        </div>
                        <div class="tab-pane fade" id="service-two">
                            <h4>Service Two</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                        </div>
                        <div class="tab-pane fade" id="service-three">
                            <h4>Service Three</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                        </div>
                        <div class="tab-pane fade" id="service-four">
                            <h4>Service Four</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae repudiandae fugiat illo cupiditate excepturi esse officiis consectetur, laudantium qui voluptatem. Ad necessitatibus velit, accusantium expedita debitis impedit rerum totam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus quibusdam recusandae illum, nesciunt, architecto, saepe facere, voluptas eum incidunt dolores magni itaque autem neque velit in. At quia quaerat asperiores.</p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Service List -->
            <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Service List</h2>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service One</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service Two</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-support fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service Three</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service Four</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-bomb fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service Five</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-bank fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service Six</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-paper-plane fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service Seven</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-space-shuttle fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service Eight</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-recycle fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service Nine</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    <!-- /.container -->
    @endsection

    @section('script')
    <!-- jQuery -->
    <script src="{{asset('js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>

</body>

</html>
