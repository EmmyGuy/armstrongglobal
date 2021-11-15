@extends('adminlte::page')

@section('title', 'Upload Project')
@section('style')
    
@endsection


@section('content')
 

      <div class="container">
        <div class="col-md-10 col-md-offset-0">
                
          <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Upload Project</h3>
            </div>
            <div class="box-body">
              <div class="box-tools pull-right">
                <!-- <span>
                  <a href="#" class="btn  btn-success"><i class="fa fa-plus"></i> Add User</a>
                </span>  --> 
                {!! Form::open(['route' => ['get-student'], 'method'=>'POST', 'role' => 'form']) !!}
                  {{ csrf_field() }}
                  <div class="col-md-6 col-md-offset-3">
                    <div class="input-group input-group-md">
                      <input type="text" name="registration_no" placeholder="Enter Matriculation Number" class="form-control">
                          <span class="input-group-btn">
                            <button type="submit" class="btn btn-success btn-flat" name="show_student" id="show_student">Get Student!</button>
                          </span>
                  </div>
                  </div>
                {!! Form::close() !!} 
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
                        <label for="recipient-name" class="control-label">Title:</label>
                        <input type="text" class="form-control" name="title" id="title" >
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">Price:</label>
                        <input type="text" class="form-control" name="price" id="price">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="control-label">Abstract:</label>
                        <textarea class="form-control" name="abstract" rows="8" id="abstract" ></textarea>
                      </div>
                        
                        <input type="hidden" name="token" id="token" value="{{csrf_token()}}">

                      <div class="form-group">
                        <label for="project">Select Project</label>
                          <!-- {!! Form::file('project', ['id'=>'project'] )!!}-->
                        
                       <input id="project" name="project" type="file"> 
                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                      </div>
                    </form>
                  </div> 
                </div>
                
                <div class="delete-content">
                  <center><h3>Are you sure you want to delete:</h3> </center> <br> 
                  <center><h4><span class="title"></span>?</center> </h4> 
                  <span class="hidden id" ></span>
                </div>

                <div class="modal-footer">
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
    $('#projects').DataTable({
        select:true,
      });
  });

  //view project modal
  $(document).on("click", ".open-myModal", function (e) {
        // e.preventDefault();
    $('.actionBtn').remove();
    $('.modal-title').text('Edit');
    $('.delete-content').hide();
    $('#form-horizontal').show();
    // $('#myModal').modal('show');
    var id = $(this).data('id');
    console.log(id);
     
    $.get(url + '/' + id, function(data){

      // console.log(data);
      $(".modal-title").text( data.title );
      $(".modal-body").text( data.abstract );
      $('#myModal').modal('show');
    });
  });

  //edit project modal
  $(document).on("click", ".editModal", function (e) {
    e.preventDefault();
    $('#footer_action_button').text('Update');
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Edit');
    $('.delete-content').hide();
    $('#form-horizontal').show();
    $('#myModal').modal('show');
    $('#title').val($(this).data('title'));
    $('#price').val($(this).data('price'));
    $('#abstract').val($(this).data('abstract'));
    $('#id').val($(this).data('id'));
      
      var prj_id = $(this).data('id');
      var url = '{{url("show-project-edit")}}';
  });

  $(".modal-footer").on("click", ".edit", function (e) {
    e.preventDefault();
    if($('#title').val()=='')
    {
      alert('Title field is required');

    }else if($('#price').val()=='')
    {
      alert('Price field is required');

    }else if($('#abstract').val()=='')
    {
      alert('Abstract field is required');

    }else if($('#project').val()=='')
    {
      alert('File field is empty; please select file to be uploaded!');
    }else{
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
          $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.title + "</td><td>" + data.price + "</td><td><a href='#myModal' class='open-myModal btn btn-success btn-xs' data-id='" + data.id + "'data-title='" + data.title + "'data-price='" + data.price + "'data-abstract='" + data.abstract + "'>view </a> <a href='#editModal' class='editModal btn btn-info btn-xs' data-id='" + data.id + "'data-title='" + data.title + "'data-price='" + data.price + "'data-description='" + data.abstract + "'>edit </a> <a href='#deleteModal' class='deleteModal btn btn-danger btn-xs' data-id='" + data.id + "'>delete</a></td><tr>");

          $('#form-horizontal')[0].reset();
          $('#myModal').modal('hide');
          // $('#projects').html(data);
           // console.log(data);
        },
        error:function(){
          alert('error!');
        }

      });
    }
  });

//Delete project
  $(document).on('click', '.delete-modal', function(e){
    e.preventDefault();
    $('#footer_action_button').text("Delete");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delete');
    $('.modal-title').text('Delete');
    $('.id').text($(this).data('id'));
    $('#deleteContent').show();
    $('#form-horizontal').hide();
    // $('#form-horizontal').hide();
    $('.title').html($(this).data('title'));
    $('#myModal').modal('show');
  });
  
  $('.modal-footer').on('click', '.delete', function(){
    $.ajax({
      url:'{{url("delete-project")}}',
      type:'POST',
      data:{
        '_token':$('input[name=_token]').val(),
        'id':$('.id').text()
      },
      success: function(data){
        alert(data);
        $('.item' + $('.id').text()).remove();
        $('#myModal').modal('hide');
      }
    });
  });

});
</script>
  
<script>
    $('#flash-overlay-modal').modal();
</script>
@endsection
