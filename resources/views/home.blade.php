@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
        <div class="col-md-12 col-md-offset-0">
                
          <div class="box box-success">
            <div class="box-header with-border">
            <h3 class="box-title"><p>  All available Training(s)</p></h3>
            </div>
            @if (session('role') == "User")
                <div class="">
                    <div class="row">
                        
                            <div class="col-lg-12">
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
                    </div>
                </div>
            </div>
        </div>
</div>
        @endif

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
						<button type="button" class="btn actionBtn" id="actionBtn" >
							<span id="footer_action_button" class="glyphicon"></span>
						</button>
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

<script>
    $(document).ready(function(){
        var url = '{{url("show-project")}}';
        var checker = $('#checker').val();
        var downloadArea = $('#downloadArea');
        
        // if (checker != ""){
        // 	swal("Good!", "Please click on the link to download project", "info");
        // 		$('html, body').animate({
        // 		scrollTop: $(downloadArea).offset().top
        // 	}, 'slow');
        // }
        
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
                            // console.log(data);
                            var transact_id = data;
                            $('#form-horizontal')[0].reset();
                            $('#myModal').modal('hide');
                            
                            $.get( "{{ url('services/check-out')}}" + "/"+ id + "/" + email + '/' + transact_id, function( data ) {

                                $('#check-out-Modal').modal();
                                $('#check-out-Modal').on('shown.bs.modal', function(){
                                    $('#check-out-Modal .load_modal').html(data.view);
                                    $('#project-title').text(data.buyer.title);
                                    $('#amount').val(data.buyer.price * 100);
                                    $('#orderID').val(data.buyer.transact_id);
                                    $('#buyer-email').val(data.buyer.email);
                                    $('#reference').val(data.buyer.transactRef);

                                    //Update buyer infor on transaction_tbl with transaction
                                    var formData = new $("#check-out-form").serialize();
                                    $.ajax({
                                        url:'{{route("update-buyer-contacts-ref")}}',
                                        type:'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': $('input[name=_token]').val()
                                        },
                                        data: formData,

                                        success:function(data){
                                        },
                                    });
                                });
                                
                                $('#check-out-Modal').on('hidden.bs.modal', function(){
                                    $('#check-out-Modal .modal-body').data(data.buyer.title);
                                });
                            });
                        },

                    });
                    
                }//End if condition
                
            });
        });

        //redirect to paystack payment gateway
        $(document).on("click", ".proceed-pay", function(e) {
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
@stop