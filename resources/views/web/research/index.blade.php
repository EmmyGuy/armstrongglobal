@extends('web.template')

@section('content')

    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Projects Page
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Project Materials</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <!-- <div class="col-md-2">
                <div class="list-group">
                    <a href="index.html" class="list-group-item">Home</a>
                    <a href="about.html" class="list-group-item">About</a>
                    <a href="services.html" class="list-group-item">Services</a>
                    <a href="contact.html" class="list-group-item">Contact</a>
                    <a href="portfolio-1-col.html" class="list-group-item">1 Column Portfolio</a>
                    <a href="portfolio-2-col.html" class="list-group-item">2 Column Portfolio</a>
                    <a href="portfolio-3-col.html" class="list-group-item">3 Column Portfolio</a>
                    <a href="portfolio-4-col.html" class="list-group-item">4 Column Portfolio</a>
                    <a href="portfolio-item.html" class="list-group-item">Single Portfolio Item</a>
                    <a href="blog-home-1.html" class="list-group-item">Blog Home 1</a>
                    <a href="blog-home-2.html" class="list-group-item">Blog Home 2</a>
                    <a href="blog-post.html" class="list-group-item">Blog Post</a>
                    <a href="full-width.html" class="list-group-item">Full Width Page</a>
                    <a href="sidebar.html" class="list-group-item active">Sidebar Page</a>
                    <a href="faq.html" class="list-group-item">FAQ</a>
                    <a href="404.html" class="list-group-item">404</a>
                    <a href="pricing.html" class="list-group-item">Pricing Table</a>
                </div>
            </div> -->
            <!-- Content Column -->
            <div class="col-md-10">
                <h2>Welcome to our projects Bank</h2>
                <p>Click on the view button to paruz our rich project summary. You can place an order and you get a download link sent to you on the go...</p>

                <hr>
                <div class="box-body">
                    <div class="">
                      <table id="projects" name="projects" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Project Title</th>
                            <th>Project Price</th>
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
                              <td>{{$project->price}}</td>
                              <!-- <td>{{$project->created_at}}</td> -->
                              <td>
                                
                                <a href="#myModal" class="open-myModal btn btn-success btn-xs" data-toggle="modal" data-title="{{$project->title }}" data-abstract="{{$project->abstract}}" data-id="{{$project->id}}" data-price="{{$project->price}}">abstract</a>
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
    <!-- /.row -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
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
                  <input type="text" class="form-control" name="phone" id="phone" >
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="control-label">Email:</label>
                  <input type="text" class="form-control" name="email" id="email" >
                </div>
            </div>

              <input type="hidden" name="id" id="id" value="">
              <input type="hidden" name="price" id="price" value="">
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
@endsection
<!-- /.container -->

@section('extra-scripts')
    <!-- <script src="{{ asset ('/vendor/adminlte/plugins/jQuery/jquery-3.2.1.js') }}"></script> -->
    <script type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/jquery.dataTables.min.js')}}"></script>

    <script type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
      $(document).ready(function(){
        var url = '{{url("show-project")}}';
        
        //Show dataTable
        $(function(){
          $('#projects').DataTable({
              select:true,
            });
        });

        $('#myModal').on('hidden.bs.modal', function () {
           location.reload();
          });
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
             
            $.get(url + '/' + id, function(data){

              // console.log(data);
              $(".modal-title").text( data.title );
              $("#message").text( data.abstract );
              $("#price").val( data.price );
              $("#id").val( data.id );
              console.log($("#price").val());
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
                  $.ajax({
                      url:'{{route("save-buyer-contacts")}}',
                      type:'POST',
                      headers: {
                          'X-CSRF-TOKEN': $('input[name=_token]').val()
                      },
                      data: formData,

                      success:function(data){
                        console.log(data);
                        var transact_id = data;
                        $('#form-horizontal')[0].reset();
                        $('#myModal').modal('hide');

                          window.location.href = "{{ url('services/check-out')}}" + "/"+ id + "/" + email + '/' + transact_id;
                         },

                    });
                  // window.location.href = "{{ url('services/check-out')}}" + "/"+ id + "/" + email + '/' + transact_id;
              });
          });

      });  
    </script>
@endsection
