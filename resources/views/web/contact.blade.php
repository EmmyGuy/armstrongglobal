@extends('web.template')

    @section('content')

        <!-- Page Content -->
        <div class="container">

            <!-- Page Heading/Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Contact
                        <small>we await your call</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{url('/topics')}}">Home</a>
                        </li>
                        <li class="active">Contact</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <!-- Content Row -->
            <div class="row">
                <!-- Map Column -->
                <div class="col-md-8">
                    <!-- Embedded Google Map -->
                    <!-- <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe> -->

                    <iframe width="90%" height="350px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://localhost/data_world/resources/assets/images/ibadan.png" height="400" width="632"></iframe>
                </div>
                <!-- Contact Details Column -->
                <div class="col-md-4">
                    <h3>Contact Details</h3>
                    <p>
                        Plot F block 2 Adeyemolay out<br>Akobo, Ibadan<br>
                    </p>
                    <p><i class="fa fa-phone"></i> 
                        <abbr title="Phone">P</abbr>: (+234) 8134302194</p>
                    <p><i class="fa fa-envelope-o"></i> 
                        <abbr title="Email">E</abbr>: <a href="mailto:name@example.com">researchpad8@gmail.com</a>
                    </p>
                    <p><i class="fa fa-clock-o"></i> 
                        <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM</p>
                    <ul class="list-unstyled list-inline list-social-icons">
                        <li>
                            <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->

            <!-- Contact Form -->
            <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
            <div class="row">
                <div class="col-md-8">
                    <h3>Send us a Message</h3>
                    <form id="message-form" method="post" role="form" >
                   
                        {{ csrf_field() }}
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Full Name:</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Phone Number:</label>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number" required data-validation-required-message="Please enter your phone number.">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Email Address:</label>
                                <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Message Subject:</label>
                                <input type="text" class="form-control" id="message_subject" name="message_subject" required data-validation-required-message="Please enter your message subject.">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Message:</label>
                                <textarea rows="10" cols="100" class="form-control" id="message" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <div id="success"></div>
                        <!-- For success/fail messages -->
                        <button id="submit" type="button" class="btn btn-success">Send Message</button>
                    </form>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    @endsection

    @section('extra-scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on('click', '#submit', function(){
                // alert('hurray');
                if($('#full_name').val()=='')
                {
                  alert('Full name field is required');

                }else if($('#phone_number').val()=='')
                {
                  alert('Phone number field is required');

                }else if($('#email').val()=='')
                {
                  alert('Email field is required');

                }else if($('#message_subject').val()=='')
                {
                  alert('Message field is required!');
                }else{

                    var formData = new $("#message-form").serialize();
                    console.log(formData);

                    $.ajax({
                        url:'{{route("send-message")}}',
                        type:'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('input[name=_token]').val()
                        },
                        data: formData,

                        success:function(data){
                            console.log(data);
                            alert(data);
                          $('#message-form')[0].reset();
                        },
                        error:function(){
                          alert('error!');
                        }
                    });
                }
            });
        });
    </script>

@endsection
