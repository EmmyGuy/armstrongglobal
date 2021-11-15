@extends('adminlte::page')

@section('title', 'Upload Project')
@section('style')
    
@endsection


@section('content')
 

      <div class="container">
        <div class="col-md-10 col-md-offset-0">
                
          <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Upload Questions</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="projects" name="projects" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Matric </th>
                        <th>Gender</th>
                        <!-- <th>Date Upladed</th> -->
                        <th>Status</th>
                      </tr>
                    </thead>

                    <tbody>
                    
                      
                      <tr >
                        <td>{{$student->name}}</td>
                        <td>{{$student->age}}</td>
                        <td>{{$student->gender}}</td>
                        
                        @if($student->gender != 1)
                          <td><span class="label label-success">paid</span></td>
                        @else
                          <td><span class="label label-danger">not paid</span></td>
                        @endif
                      </tr>
                      
                    </tbody>
                  </table>
              </div>
              <!-- <div class="box-tools pull-right"> -->
                <!-- <span>
                  <a href="#" class="btn  btn-success"><i class="fa fa-plus"></i> Add User</a>
                </span>  --> 
                <form role="form" enctype="multipart/form-data" method="POST">
                  {{ csrf_field() }}
                  <hr>
                  <div class="col-md-10 col-md-offset-1">
                    <div class="input-group input-group-md">
                      <input type="text" id="question" placeholder="Enter Question" class="form-control">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-success btn-flat" name="submit" id="submit">Submit</button>
                        </span>
                    </div>
                  </div>

                  <input type="hidden" name="id" id="id" value="{{$student->id}}">
                  {!! Form::close() !!} 
                </form>
          <!-- </div> -->
                <hr>

                
              </div>
              <div class="col-md-10 col-md-offset-1">
                  <table id="question-table" name="question-table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Question </th>
                        <!-- <th>Gender</th>
                        <th>Date Upladed</th>
                        <th>Status</th> -->
                      </tr>
                    </thead>

                    <tbody>
                      <tr >
                        <td></td>
                        <td></td>   
                      </tr>
                    </tbody>
                  </table>
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
  // $(function(){
  //   $('#projects').DataTable({
  //       select:true,
  //     });
  // });


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

  $(document).on("click", "#submit", function (e) {
    // alert('Here!');
    e.preventDefault();
    if($('#question').val()=='')
    {
      alert('Question field is required');

    }else{
      var url = '{{route("save-question")}}';

      var que = $('#question').val();
      var stud_id  = $('#id').val();
      // console.log(stud_id);

      $.ajax({
        url:'{{route("save-question")}}',
        type:'POST',
  
        data: {
          '_token':$('input[name=_token]').val(),
          'stu_id':stud_id,
          'que':que
        },
        
        success:function(data){
          console.log(data);
           var sn =1;
          for(var i=0; i<=Object.keys(data).length; i++){
            // JSONObject que = data.getJSONObject(i);
            var curr = data[i];

            $('#question-table').find('tbody').append( "<tr><td>" + sn +"</td><td>"+ curr.question+"</td></tr>" );
            sn++;
          }
        },
        error:function(data){
          alert(data);
        }

      });
    }
  });

//Delete project
  // $(document).on('click', '.delete-modal', function(e){
  //   e.preventDefault();
  //   $('#footer_action_button').text("Delete");
  //   $('#footer_action_button').removeClass('glyphicon-check');
  //   $('#footer_action_button').addClass('glyphicon-trash');
  //   $('.actionBtn').removeClass('btn-success');
  //   $('.actionBtn').addClass('btn-danger');
  //   $('.actionBtn').addClass('delete');
  //   $('.modal-title').text('Delete');
  //   $('.id').text($(this).data('id'));
  //   $('#deleteContent').show();
  //   $('#form-horizontal').hide();
  //   // $('#form-horizontal').hide();
  //   $('.title').html($(this).data('title'));
  //   $('#myModal').modal('show');
  // });
  
  // $('.modal-footer').on('click', '.delete', function(){
  //   $.ajax({
  //     url:'{{url("delete-project")}}',
  //     type:'POST',
  //     data:{
  //       '_token':$('input[name=_token]').val(),
  //       'id':$('.id').text()
  //     },
  //     success: function(data){
  //       alert(data);
  //       $('.item' + $('.id').text()).remove();
  //       $('#myModal').modal('hide');
  //     }
  //   });
  // });

});
</script>
  
<script>
    $('#flash-overlay-modal').modal();
</script>
@endsection
