@extends('adminlte::page')

@section('title', 'Upload Project')
@section('style')
    
@endsection


@section('content')
 

      <div class="container">
        <div class="col-md-11 col-md-offset-0">
                
          <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">See All Messages</h3>
            </div>
            <div class="box-body">
                <div class="">
                  <table id="messages" name="messages" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Sender's Name</th>
                        <th>Messsage Subject</th>
                        <th>Sender's Contact</th>
                        <th>Sender's Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                    <?php $sn=1; ?>
                    @if($messages != null )
                      @foreach($messages as $message)
                        <tr class="item{{$message->id}}">
                          <td>{{$sn++}}</td>
                          <td>{{$message->full_name}}</td>
                          <td>{{$message->subject}}</td>
                          <td>{{$message->phone_number}}</td>
                          <td>{{$message->user_email}}</td>
                          
                          <td>
                            
                            <!-- <a href="#myModal" class="open-myModal btn btn-success btn-xs" data-toggle="modal" data-full_name="{{$message->full_name }}" data-email="{{$message->user_email}}" data-message="{{$message->message}}" data-subject="{{$message->subject}}" data-id="{{$message->id}}">view message</a> -->

                            <a href="#editModal" class="editModal btn btn-success btn-xs" data-toggle="modal" data-full_name="{{$message->full_name }}" data-email="{{$message->user_email}}" data-message="{{$message->message}}" data-subject="{{$message->subject}}" data-id="{{$message->id}}">view message</a>
                          </td>
                        </tr>
                      @endforeach
                    @endif
                      
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
                        <textarea class="form-control" name="reply_mesg" rows="8" id="reply_mesg" ></textarea>
                      </div>
                        @if($messages == null )
                          <input type="hidden" name="id" id="id" value="{{$message->id}}">
                          <input type="hidden" name="sender_name" id="sender_name" value="{{$message->full_name}}">
                          <input type="hidden" name="email" id="email" value="{{$message->user_email}}">
                          <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                        @endif
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
<script src="{{ asset ('/vendor/sweetalert-master/dist/sweetalert.min.js') }}"></script>
			@include('sweet::alert')
<script>
// 
$(document).ready(function(){
  var url = '{{url("show-project")}}';
  
  //Show dataTable
  $(function(){
    $('#messages').DataTable({
        select:true,
      });
  });

  $('#myModal').on('hidden.bs.modal', function () {
     location.reload();
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
    
      var url = '{{route("send-mail")}}';
      var read_url = '{{url("change-message-status")}}';

      var id = $('#id').val();

      var user_email = $('#email').val();
      var reply = $('#reply_mesg').val();
      var sender_name = $('#sender_name').val();
      var subject = $('#subject').val();

      
      // alert(sender_name);
      // var formData = new FormData($('#form-horizontal')[0]);
      // console.log(formData);

      $.ajax({
        url:'{{route("send-mail")}}',
        type:'POST',
        headers: {
            'X-CSRF-TOKEN': $('input[name=_token]').val()
        },
        data: {
          'user_email':user_email,
          'reply':reply,
          'subject':subject,
          'sender_name':sender_name
        },
        // processData: false,
        // contentType: false,

        success:function(data){
          //change message status to read
          swal("Good!", "Your mail has been successfully sent.", "success");
          // $.get(read_url + '/' + id, function(data){

          // // console.log(data);
          // alert(data);
  
          // });
          // $('#form-horizontal')[0].reset();
          // $('#myModal').modal('hide');
          // $('#projects').html(data);
           
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
