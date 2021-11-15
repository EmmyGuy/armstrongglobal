@extends('web.template')

@section('content')

    <!-- Page Content -->
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sidebar Page
                    <small>Subheading</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Sidebar Page</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-2">
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
            </div>
            <!-- Content Column -->
            <div class="col-md-10">
                <h2>Proceed to Checkout Gateway</h2>
                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, et temporibus, facere perferendis veniam beatae non debitis, numquam blanditiis necessitatibus vel mollitia dolorum laudantium, voluptate dolores iure maxime ducimus fugit.</p> -->

                <hr>
                <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                        <div class="row" style="margin-bottom:40px;">
                          <div class="col-md-8 col-md-offset-2">
                            <!-- <p> -->
                                <div>
                                    <span>
                                      <h3>You are about to pay for {{ $buyer['title'] }} project material!
                                    </h3></span>
                                </div>
                            <!-- </p> -->
                            <?php   echo $price = $buyer['price'] * 100; echo $email = $buyer['email']; $id = $buyer['transact_id']; $transactRef=$buyer['transactRef']?>
                            <input type="hidden" name="email" value="{{$buyer['email']}}"> {{-- required --}}
                            <input type="hidden" name="orderID" id="orderID" value="{{$buyer['transact_id']}}" >
                            <input type="hidden" name="amount" value="{{ $buyer['price'] * 100 }}"> {{-- required in kobo --}}
                            <input type="hidden" name="quantity" value="1">
                            <input type="text" name="reference" id="reference" value="{{ $buyer['transactRef'] }}"> {{-- required --}}
                            <input type="text" name="key" value="{{ config('paystack.secretKey') }}" /> {{-- required --}}
                            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                             <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
                             <br>
                            <p>
                              <button class="btn btn-success btn-lg btn-block" id="pay" type="submit" value="Pay Now!">
                              <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                              </button>
                            </p>
                          </div>
                        </div>
                </form>
              </div>
        </div>
    </div>

  </div>
@endsection
<!-- /.container -->

@section('extra-scripts')
    <script type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/jquery.dataTables.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/dataTables.bootstrap.min.js')}}"></script>
<script>
// 
$(document).ready(function(){
  var transact_ref = $('#reference').val();
  var transact_id  = $('#orderID').val();
  console.log(transact_id);

  $.ajax({
    url:'{{route("update-buyer-contacts-ref")}}',
    type:'POST',
    headers: {
        'X-CSRF-TOKEN': $('input[name=_token]').val()
    },
    data: {transact_ref: transact_ref, transact_id: transact_id},

    success:function(data){
      console.log(data);
      var transact_id = data;
      // $('#form-horizontal')[0].reset();
      // $('#myModal').modal('hide');

        // window.location.href = "{{ url('services/check-out')}}" + "/"+ id + "/" + email + '/' + transact_id;
       
    },

  });
    // window.location.href = "{{ url('services/check-out')}}" + "/"+ id + "/" + email + '/' + transact_id;
// });
});
</script>
  
<script>
    $('#flash-overlay-modal').modal();
</script>
@endsection
