@extends('home')

@section('title', 'Upload Project')


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
			{!! Form::open(array('route' => 'do-upload-project','method'=>'POST', 'role' => 'form', 'files' => 'true', 'enctype' => 'multipart/form-data')) !!}
            {{ csrf_field() }}
          <!-- general form elements -->
	      	<div class="box box-success">
	        	<div class="box-header with-border">
	          		<h3 class="box-title">Upload Project</h3>
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
	            		<div class="form-group {{ $errors->has('project_title') ? ' has-error' : '' }}" >
	              			<label for="projectTiltle">Project Title</label>
	              			<input type="text" name="project_title" class="form-control" placeholder="Title...">
	              			@if ($errors->has('project_title'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('project_title') }}</strong>
                              </span>
                          	@endif
	            		</div>

	            		<div class="form-group{{ $errors->has('project_price') ? ' has-error' : '' }}">
	              			<label for="projectPrice">Project Price</label>
	              			<input class="form-control" name="project_price" placeholder="e.g. 6000" type="text">
	              			@if ($errors->has('project_price'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('project_price') }}</strong>
                              </span>
                          	@endif
	            		</div>

		            	<div class="form-group{{ $errors->has('abstract') ? ' has-error' : '' }}">
		              		<label for="abstract">Abstarct</label>
							<textarea class="form-control" rows="6" name="abstract" placeholder="Not more than 200 words ..."></textarea>
							@if ($errors->has('abstract'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('abstract') }}</strong>
                              </span>
                          	@endif
		            	</div>

	            		<div class="form-group{{ $errors->has('project') ? ' has-error' : '' }}">
	              			<label for="project">Select Project</label>
		              		{{Form::file('project')}}
		              		@if ($errors->has('project'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('project') }}</strong>
                              </span>
                          	@endif
		             		 <!-- <input id="exampleInputFile" type="file"> -->	
		              		<!-- <p class="help-block">Example block-level help text here.</p> -->
	            		</div>
	          		</div>
	          		<!-- /.box-body -->

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