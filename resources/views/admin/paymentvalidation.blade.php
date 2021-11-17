@extends('home')

@section('title', 'Validate Payment')


@section('content')
	<div class="container">
		@foreach ((array) session('flash_notification') as $message)
			@php $message = (array)$message[0]; @endphp
			    @if ($message['overlay'])
			        @include('flash::modal', [
			            'modalClass' => 'flash-modal',
			            'title'      => $message['title'],
			            'body'       => $message['message']
			        ])
			    @else
			        <div class="alert
			                    alert-{{ $message['level'] }}
			                    {{ $message['important'] ? 'alert-important' : '' }}"
			                    role="alert"
			        >
			            @if ($message['important'])
			                <button type="button"
			                        class="close"
			                        data-dismiss="alert"
			                        aria-hidden="true"
			                >&times;</button>
			            @endif

			            {!! $message['message'] !!}
			        </div>
			    @endif
			@endforeach

			{{ session()->forget('flash_notification') }}
		<div class="col-md-8 col-md-offset-1">
			<!-- {!! Form::open([ 'route' => [ 'do-upload-project' ], 'method' => 'post', 'files' => 'true',  'id' => 'project-upload' ]) !!} -->
			{!! Form::open(array('route' => 'send-validation','method'=>'POST', 'role' => 'form', 'files' => 'true')) !!}
            {{ csrf_field() }}
          <!-- general form elements -->
	      	<div class="box box-success">
	        	<div class="box-header with-border">
	          		<h3 class="box-title">V A L I D A T E Payment</h3>
	        	</div>
	        <!-- /.box-header -->
	        <!-- form start -->
	        @if (Session::has('sweet_alert.alert'))
			    <script>
			        swal({!! Session::get('sweet_alert.alert') !!});
			    </script>
			@endif

			{{-- @if (count($errors) > 0)
                <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
                
                    <div class="box-body">
	            		<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}" >
	              			<label for="projectTiltle">Email</label>
	              			<input type="text" name="email" class="form-control" placeholder="email used for signup">
	              			@if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          	@endif
	            		</div>

	            		<div class="form-group{{ $errors->has('ref') ? ' has-error' : '' }}">
	              			<label for="ref">RRR</label>
	              			<input class="form-control" name="ref" placeholder="rrr" type="text">
	              			@if ($errors->has('ref'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('ref') }}</strong>
                              </span>
                          	@endif
	            		</div>

		            	
		            <div class="box-footer">
		            	<span class="right" style="width: 400px; float: right; "><button type="submit" class="btn btn-success"><i class="fa fa-paper-plane" ></i> Proceed</button></span>
		               <!-- <button type="button" class="btn btn-success">Submit</button> -->
		            </div>
          		</div>
          	{!! Form::close() !!}
          <!-- /.box -->
    	</div>
    </div>	    
@stop

@section('css')
@stop

@section('extra-scripts')
    <script> console.log('Hi!'); </script>

	<script>
	    $('#flash-overlay-modal').modal();
	</script>
@stop