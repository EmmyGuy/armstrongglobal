@extends('adminlte::page')

@section('title', 'Upload Project')
@section('style')
    
@endsection


@section('content')
 

      <div class="container">
        <div class="col-md-10 col-md-offset-0">
                
          <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Respondents</h3>
            </div>
            <div class="box-body">
              <div>
                <table id="response" name="response" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      <?php $i=1; ?>
                        <th>Res</th>
                        @for($i=1; $i <= $countQue; $i++)
                          <th>Que {{$i}} </th>
                        @endfor
                      </tr>
                    </thead>

                    <tbody>
                    
                      <?php $sn=1; $Acount=0;?>
                        
                          @for($y=1; $y <= $countRes / $countQue; $y++)
                            <tr>
                              <td>{{$sn++}}  </td>
                              @for($i = 0; $i < $countQue; $i++)
                                @if($Acount < $countRes)
                                  <td>{{$responseArray[$Acount++]}}</td>
                                @endif
                              @endfor
                            </tr>
                          @endfor
                        
                    </tbody>
                  </table>
              </div>
              
                <hr>

            
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
  
  //Show dataTable
  $(function(){
    $('#response').DataTable({
        select:true,
        "scrollX": true
      });
  });
});
</script>

@endsection
