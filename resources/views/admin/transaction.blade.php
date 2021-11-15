@extends('adminlte::page')

@section('title', 'Upload Project')
@section('style')
    
@endsection
<style>
    .error {
      color: red;
      font-size:10px;
   }
   html
    {
        font-size: 100%;
    }
    /* #more-hd{
    display: none !important;
    } */
    label {
    display: block;
    font: 1rem 'Fira Sans', sans-serif;
    }
    
    select option{
    font-size: 10pt;
    }
        option:not(:first-of-type) {
        color: black;
    }
   /* select option:first-child {
    font-size: 7pt;
} */


</style>


@section('content')
 

      <div class="container noprint" >
        <div class="col-md-10 col-md-offset-0">
                
          <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"> All Transactions</h3>
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
                              <a href="#editModal" class="editModal btn btn-primary btn-xs" data-toggle="modal" data-full_name="" data-email="" data-transaction="" data-subject="" data-id="{{$transaction->id}}">primary</a>
                            </td>
                          @elseif($transaction->status_id == 2)
                            <td>
                              <a href="#editModal" class="editModal btn btn-success btn-xs" data-toggle="modal" data-full_name="" data-email="" data-transaction="" data-subject="" data-id="{{$transaction->id}}">fill form</a>
                            </td>
                            @else
                              <td>
                              <a href="#editModal" class="editModal btn btn-danger btn-xs" data-toggle="modal" data-full_name="" data-email="" data-transaction="" data-subject="" data-id="{{$transaction->id}}">failed</a>
                            </td>
                          <!-- <td>{{$transaction->user_email}}</td> -->
                          @endif
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
               <hr>

               <div class=" col-lg-8" >
                  <b>Training Schedule</b>
                  <table class="table" style='font-size:100%' >  
                      <thead>
                          <tr>
                              <th>sn</th>
                              <th>Application title</th>
                              <th>Category </th>
                              <th>Venue </th>
                              <th>Date</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody id="application_table">
                      <?php $n = 0; ?>
                      @foreach($applications as $key => $application)
                          <tr data-entry-id="{!! $application->id !!}">
                              <td>
                                  {{ $n+=1 }}
                              </td>
                              <td>
                                  {{ $application->group }}
                              </td>
                              <td>
                                  {{ $application->location }}
                              </td>
                              <td>
                                  {{ $application->date }}
                              </td>
                              <td>
                                  <!-- <button class="btn-sm btn-success btn-pritn" id="pritn" type="button">
                                      + Print
                                  </button> -->
                                  <a href="#printModal" class="printModal btn btn-danger btn-xs" data-toggle="modal" data-full_name="" data-email="" data-transaction="" data-subject="" data-id="{!! $application->id !!}">print</a>

                              </td>
                          </tr>
                      @endforeach
                      </tbody>
                          <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />   -->
                  </table>
                  
              </div>
            </div>
          </div>

          <!-- General Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
                </div>

                <div class="modal-body">
                  <b>Property Information</b>
                  <form name="add_building" id="add_building">
                  {{ csrf_field() }}
                  <input type="hidden" id="transact-id" name="transact_id"  class="form-control"  value=""/>
                      <table class="table table-bordered">
                          <tr>
                              <td>
                              <b>state</b>
                                <select class="form-control building_services" name="state"  required="">
                                    <option value="Plateau">Plateau</option>
                                </select>
                            </td>
                            <td>
                            <b>lga</b>
                                <select class="form-control building_services" name="lga"  required="">
                                    <option value="Jos North">Jos North</option>
                                    <option value="Bassa">Bassa</option>
                                    <option value="Jos East">Jos East</option>
                                    <option value="Jos South">Jos South</option>
                                    <option value="Riyom">Riyom</option>
                                    <option value="B/Ladi">B/Ladi</option>
                                    <option value="Bokkos">Bokkos</option>
                                    <option value="Mangu">Mangu</option>
                                    <option value="Pankshin">Pankshin</option>
                                    <option value="Kanke">Kanke</option>
                                    <option value="Kanke">Kanke</option>
                                    <option value="Wase">Wase</option>
                                    <option value="Langtang North">Langtang North</option>
                                    <option value="Langtang South">Langtang South</option>
                                    <option value="Mikang">Mikang</option>
                                    <option value="Shendam">Shendam</option>
                                    <option value="Qua'anpan">Qua'anpan</option>
                                </select>
                            </td> 
                              
                          </tr>
                          <tr>
                          <td>
                              <b>achool category</b>
                                <select class="form-control building_services" name="school_category"  required="">
                                    <option value="Public">Public</option>
                                    <option value="Private">Private</option>
                                </select>
                            </td>
                              <td>
                              <b>private school category</b>
                                  <select name="private_cat_option" id="private_cat_option" class="form-control" style="font-size:13px;" required="">
                                      <option value="Sole Proprietorship">Sole Proprietorship</option>
                                      <option value="Mission">Mission</option>
                                      <option value="Community">Community</option>
                                      <option value="Others">Others</option>
                                  </select>
                              </td>
                          </tr>
                          <br/>
                          <tr>
                              <td>
                                  <b>school name</b>
                                  <input type="text" id="school_name" name="school_name" placeholder="Enter School name" class="form-control"  required="" style="font-size:13px;"/>
                              </td>
                              <td>

                              <b>establishment date</b>
                                  <input type="date" id="est_date" name="est_date" value=""  class="form-control" style="font-size:13px;" required="">
                              </td>
                              
                          </tr>
                          <tr>
                            <td>
                                  <b>Staff Strength</b>
                                  <input type="number" id="staff_strength" name="staff_strength" placeholder="" class="form-control"  required="" style="font-size:13px;"/>
                              </td>
                              <td>
                                  <b>number of students</b>
                                  <input type="number" id="num_std" name="num_std" placeholder="" class="form-control"  required="" style="font-size:13px;"/>
                              </td>
                          </tr>
                          <tr>
                          <td>
                              <b>phone</b>
                              <input type="text" id="phone" name="phone" placeholder="Enter school's contact phone number" class="form-control"  required="" style="font-size:13px;"/>
                          </td>
                          <td>
                              <b>e-mail</b>
                              <input type="text" id="email" name="email" placeholder="Enter School's active email" class="form-control"  required="" style="font-size:13px;"/>
                          </td>
                          </tr>
                      </table>

                      <table class="table table-bordered" id="dynamic_field_building">
                                                                    
                      <b>Participants</b>
                          <tr>
                              <td style="width:11%"><h5> Part 1:</h5></td>
                              <td><input type="text"  name="fullname[0]" placeholder="fullname" class="form-control name_list" required="" /></td>
                              <td><input type="text" name="designation[0]" placeholder="designation" class="form-control name_list" required="" /></td>  
                              <td><button type="button" name="addBuilding" id="addBuilding" class="btn btn-sm btn-success">Add More</button></td>  
                          </tr>
                          <tr>
                              <td style="width:11%"><h5> Part 2:</h5></td>
                              <td><input type="text"  name="fullname[1]" placeholder="fullname" class="form-control name_list" required="" /></td>
                              <td><input type="text" name="designation[1]" placeholder="designation" class="form-control name_list" required="" /></td>  
                          </tr>
                          <tr>
                              <td style="width:11%"><h5> Part 3:</h5></td>
                              <td><input type="text"  name="fullname[2]" placeholder="fullname" class="form-control name_list" required="" /></td>
                              <td><input type="text" name="designation[2]" placeholder="designation" class="form-control name_list" required="" /></td>  
                          </tr>  
                      </table> 
                      
                    </div>
                  

                    <div class="modal-footer">
                    <button type="button" id="submitBuilding" class="btn btn-sm btn-primary" id="btn-save-building" value="send">Upload</button>
                  </form>
                    <!-- <button type="button" class="btn actionBtn" id="actionBtn" data-dismiss="modal">
                    <span id="footer_action_button" class="glyphicon"></span>
                  </button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span>Close -->
                  </button>
                </div>

                <!-- print modal -->
                
                </div>
              </div>
            </div>
          </div>
          
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

  <!--check-out-pay Modal-->
  <div id="check-out-Modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
  
      <div class="modal-body">
        <div class="modal-content load_modal"></div>
      </div>
    </div> 
  </div>
@endsection


@section('extra-scripts')
<!-- <script src="{{ asset ('/vendor/adminlte/plugins/jQuery/jquery-3.2.1.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/jquery.dataTables.min.js')}}"></script>

<script type="text/javascript" src="{{ asset('vendor/adminlte/dist/js/dataTables.bootstrap.min.js')}}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.5/jquery.validate.unobtrusive.min.js"></script>
<script>
// 
$(document).ready(function(){
  var url = '{{url("show-project")}}';
  
  //Show dataTable
  // $(function(){
  //   $('#transactions').DataTable({
  //       select:true,
  //     });
  // });

  $('#yourModalName').empty();
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
    $('#reply').hide();
    $('#form-horizontal').show();
    $('#myModal').modal('show');
    $('#full_name').val($(this).data('full_name'));
    $('#subject').val($(this).data('subject'));
    $('#message').val($(this).data('message'));
    $('#transact-id').val($(this).data('id'));
      
      var prj_id = $(this).data('id');
      var url = '{{url("show-project-edit")}}';
  });


  // $(".modal-footer").on('click', '.replyBtn', function(){
  //   $('#reply').show();
  // });
  
  var i=s=3; 
      var y=4;
      $('#addBuilding').click(function(){  
            
           if(i < 5){
            $('#dynamic_field_building').append('<tr id="row'+i+'"><td style="width:11%"><h5>Part '+y+':</h5></td><td><input type="text" name="fullname[' + i + ']" placeholder="designation" class="form-control name_list required" /></td><td><input type="text" name="designation[' + i + ']" placeholder="designation" class="form-control  name_list required" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-sm btn-danger btn_remove_buildin_point">X</button></td></tr>');  
           }
           i++;
           y++;
        });
      $(document).on('click', '.btn_remove_buildin_point', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
           i--;
           y--;
      });

      $('#submitBuilding').click(function(){
        $('#add_building').data('validator', null);
        $.validator.unobtrusive.parse($('#add_building'));
        if($('#add_building').valid()){         
           $.ajax({  
                url:'{!! route("save-application") !!}',  
                method:'POST',  
                data:$('#add_building').serialize(),  
                success:function(data)  
                { 
                  var dataParse = JSON.parse(JSON.stringify(data));
                  $('#add_building')[0].reset();
                  // $('#myModal').modal('hide');
                    $('#check-out-Modal').modal();
                    $('#check-out-Modal').on('shown.bs.modal', function(){
												$('#check-out-Modal .load_modal').html(data.view);
                          document.body.innerHTML = document.body.innerHTML.replace($('firstText'), data.appllicationDetail.transaction[0].title);
                        document.getElementById('training_label').textContent = data.appllicationDetail.transaction[0].title;
                        document.getElementById('school_Text').textContent = data.appllicationDetail.application.name_of_sch;
                        document.getElementById('category_Label').textContent = data.appllicationDetail.application.category;
                        document.getElementById('group_Label').textContent = data.appllicationDetail.trainingSchedule.group;
                        // document.getElementById('raining_label').textContent = data.appllicationDetail.application.num_student_Text;
                        // document.getElementById('raining_label').textContent = data.appllicationDetail.trainingSchedule.group;
                        document.getElementById('Location_Text').textContent = data.appllicationDetail.trainingSchedule.location;
                        document.getElementById('date_text').textContent = data.appllicationDetail.trainingSchedule.date;

                        for( i =0; i <= dataParse.appllicationDetail.participants.length-1; i++){ 
                        console.log( dataParse.appllicationDetail.participants[i].fullname);

                        $('dynamic_field_building').find('tbody').append('<tr id="row'+i+'"><td style="width:11%">Fullname:</td><td>'+ data.appllicationDetail.participants[i].fullname +'</td><td>Designation:</td><td></td><td>'+ data.appllicationDetail.participants[i].designation +'</td></tr>');  

														//console.log(data);
                          }
											});

                    // var land = '<tr id="id_' + data.id + '"><td>' + data.id + '</td><td>' + data.location + '</td><td>' + data.land_area + '</td><td>' + data.plots + '</td><td>' + data.access_to_property + '</td><td>' + data.estate_zone + '</td><td>' + data.statndard + '</td><td>' + data.land_value + '</td>';
                    // land += '<td><a href="javascript:void(0)" id="edit-payment-setup" data-id="' + data.id + '" class="btn btn-xs btn-info">Edit</a></td>';
                    // // user += '<td><a href="javascript:void(0)" id="delete-qpayment-setup" data-id="' + data.id + '" class="btn btn-xs btn-danger delete-payment-setup">Delete</a></td></tr>';
                    // $('#land_table').prepend(land);
                    // // $('.nav-tabs li.active').removeClass('active');
                    // // $('##myorders').addClass('active');
                    // $('#add_building')[0].reset(); 
                    
                }  
           });  
        }else{
          alert("something wrong with form!!");
        }
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
