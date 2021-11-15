@extends('adminlte::page')

@section('title', 'Upload Project')
@section('style')
    
@endsection


@section('content')
 

      <div class="container">
        <div class="col-md-10 col-md-offset-0">
                
          <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Students</h3>
            </div>
            <div class="box-body">
              <div>
                <table id="projects" name="projects" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Matric </th>
                        <th>Gender</th>
                        <!-- <th>Date Upladed</th> -->
                        <th>Status</th>
                        <th>Respondents</th>
                      </tr>
                    </thead>

                    <tbody>
                    
                      <?php $sn=1; ?>
                        @foreach($students as $student)
                          <tr class="item{{$student->id}}">
                        <tr >
                          <td>{{$student->name}}</td>
                          <td>{{$student->age}}</td>  <!-- age respresents student mat num -->
                          <td>{{$student->gender}}</td>
                          
                          @if($student-> gender != 1)
                            <td><span class="label label-success">paid</span></td>
                          @else
                            <td><span class="label label-danger">not paid</span></td>
                          @endif
                          <td><a class="btn btn-success btn-xs" href="{{ route('show-student-respondent', $student->age) }}">view</a></td>
                        </tr>

                      @endforeach
                    </tbody>
                  </table>
              </div>
              <!-- <div class="box-tools pull-right"> -->
                <!-- <span>
                  <a href="#" class="btn  btn-success"><i class="fa fa-plus"></i> Add User</a>
                </span>  --> 
                <!-- <form role="form" enctype="multipart/form-data" method="POST">
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
                </form> -->
          <!-- </div> -->
                <hr>

                <!-- <div class="box-body">
                  <table id="question-table" name="question-table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Question </th>
                      <th>Gender</th>
                      <th>Date Upladed</th>
                      <th>Status</th>
                    </tr>
                  </thead>

                  <tbody>
                  
                    
                    <tr >
                      <td></td>
                       <td></td>
                      
                    </tr>
                    
                  </tbody>
                </table>
                </div> -->
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

@endsection
