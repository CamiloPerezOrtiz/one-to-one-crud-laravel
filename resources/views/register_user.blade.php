@extends('plantillas.cuerpo')
@section('content')
	<div class="container">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Error!</strong>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			@if(Session::has('success'))
				<div class="alert alert-info">
					{{Session::get('success')}}
				</div>
			@endif
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">New user</h3>
				</div>
				<div class="panel-body">
					<form method="POST" action="{{ route('register_user_data') }}" role="form">
						{{ csrf_field() }}
						<div class="row">
							<div class="form-group">
				      			<label class="control-label col-sm-2">Name:</label>
				      			<div class="col-sm-10">
				        			<input type="text" class="form-control" name="name" id="name" placeholder="Writte the name">
				      			</div>
				    		</div>
				    		<br><br>
							<div class="form-group">
				      			<label class="control-label col-sm-2">Email:</label>
				      			<div class="col-sm-10">
				        			<input type="email" class="form-control" name="email" id="email" placeholder="Writte the email">
				      			</div>
				    		</div>
				    		<br><br>
				    		<div class="form-group">
				      			<label class="control-label col-sm-2">Password:</label>
				      			<div class="col-sm-10">          
				        			<input type="password" class="form-control" name="password" id="password" placeholder="Writte the password">
				      			</div>
				    		</div>
				    		<br><br>
				    		<div class="form-group">        
				      			<div class="col-sm-offset-2 col-sm-10">
				        			<button type="submit" class="btn btn-success">Save</button>
				      			</div>
				    		</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection