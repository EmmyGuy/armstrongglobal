@extends('adminlte::page')

@section('title', 'Upload Project')
@section('style')
    
@endsection


@section('content')
 

      <div class="container">
        <div class="col-md-10 col-md-offset-0">
                
          <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">See All Messages</h3>
            </div>
            <div class="box-body">
                <div class="">
                  <table id="transactions" name="transactions" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Project</th>
                        <th>Price</th>
                        <th>Client's Mobile</th>
                        <th>Client's Email</th>
                        <th>Transaction Date</th>
                        <th>Status</th>
                      </tr>
                    </thead>

                    <tbody>
                    <?php $sn=1; ?>
                      @foreach($transactions as $transaction)
                        <tr class="item{{$transaction->id}}">
                          <td>{{$sn++}}</td>
                          <td>{{$transaction->title}}</td>
                          <td>{{$transaction->price}}</td>
                          <td>{{$transaction->buyer_phone_num}}</td>
                          <td>{{$transaction->buyer_email}}</td>
                          <td>{{$transaction->updated_at}}</td>

                          @if($transaction->status_id == 1)
                            <td>
                              <a href="#editModal" class="editModal btn btn-primary btn-xs" data-toggle="modal" data-full_name="" data-email="" data-transaction="" data-subject="" data-id="">primary</a>
                            </td>
                          @elseif($transaction->status_id == 2)
                            <td>
                              <a href="#editModal" class="editModal btn btn-success btn-xs" data-toggle="modal" data-full_name="" data-email="" data-transaction="" data-subject="" data-id="">successful</a>
                            </td>
                            @else
                              <td>
                              <a href="#editModal" class="editModal btn btn-danger btn-xs" data-toggle="modal" data-full_name="" data-email="" data-transaction="" data-subject="" data-id="">failed</a>
                            </td>
                          <!-- <td>{{$transaction->user_email}}</td> -->
                          @endif
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
               
            </div>
          </div>

          <!-- General Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
                </div>

                <div class="modal-body">
                  <div class="col-ms-10">
                    <form id="form-horizontal" role="form" enctype="multipart/form-data" method="POST">
                      <div class="form-group" id="form-horizontal">
                        <label for="recipient-name" class="control-label">Sender's Name:</label>
                        <input type="text" class="form-control" name="full_name" id="full_name" readonly="">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">Message Subject:</label>
                        <input type="text" class="form-control" name="subject" id="subject" readonly="">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="control-label">Message:</label>
                        <textarea class="form-control" name="message" rows="8" id="message" readonly=""></textarea>
                      </div>

                      <!-- Reply textarea -->
                      <div class="form-group" id="reply">
                        <label for="message-text" class="control-label">Reply:</label>
                        <textarea class="form-control" name="reply" rows="8" id="reply" ></textarea>
                      </div>
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="email" id="email" value="">
                        <input type="hidden" name="token" id="token" value="{{csrf_token()}}">

                    </form>
                  </div>
                  
                </div>
               

                <div class="modal-footer">
                  <button type="button" class="btn replyBtn" id="replyBtn">Reply</button>

                  <button type="button" class="btn actionBtn" id="actionBtn" data-dismiss="modal">
                    <span id="footer_action_button" class="glyphicon"></span>
                  </button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span>Close
                  </button>
                </div>
              </div>
            </div>
          </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
@endsection


@section('extra-scripts')
<!-- <script src="{{ asset ('/vendor/adminlte/plugins/jQuery/jquery-3.2.1.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/jquery.dataTables.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/dataTables.bootstrap.min.js')}}"></script>
<script>
// 
$(document).ready(function(){
  var url = '{{url("show-project")}}';
  
  //Show dataTable
  $(function(){
    $('#transactions').DataTable({
        select:true,
      });
  });


  //edit project modal
  $(document).on("click", ".editModal", function (e) {
    // alert('here');
    e.preventDefault();
    $('#footer_action_button').text('Reply');
    $('#footer_action_button').addClass('glyphicon-envelope');
    // $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('send');
    $('.modal-title').text('Subject: ' + $(this).data('subject'));
    $('#reply').hide();
    $('#form-horizontal').show();
    $('#myModal').modal('show');
    $('#full_name').val($(this).data('full_name'));
    $('#subject').val($(this).data('subject'));
    $('#message').val($(this).data('message'));
    $('#id').val($(this).data('id'));
      
      var prj_id = $(this).data('id');
      var url = '{{url("show-project-edit")}}';
  });


  $(".modal-footer").on('click', '.replyBtn', function(){
    $('#reply').show();
  });


  $(".modal-footer").on("click", ".send", function (e) {
    e.preventDefault();
    alert('got it');
      var url = '{{route("edit-project")}}';

      var formData = new FormData($('#form-horizontal')[0]);
      // console.log(formData);

      $.ajax({
        url:'{{route("edit-project")}}',
        type:'POST',
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        },
        data: formData,
        processData: false,
        contentType: false,

        success:function(data){
          
          $('#form-horizontal')[0].reset();
          $('#myModal').modal('hide');
          // $('#projects').html(data);
           // console.log(data);
        },
        error:function(){
          alert('error!');
        }

      });
    // }
  });


});
</script>
  
<script>
    $('#flash-overlay-modal').modal();
</script>
@endsection
