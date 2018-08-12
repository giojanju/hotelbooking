@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Hotel services</h3>			
			</div>
			<div class="panel-body">
				@include('partials.success')
				<form method="POST" class="form-auth-small" action="{{ route('cp.hotel_services.store') }}">
                    @csrf
                    	<div class="form-group">
                    	    <label for="ge.title" class="control-label sr-only">Service title</label>
                    	    <input type="text" name="ge[title]" class="form-control{{ $errors->has('ge.title') ? ' parsley-error' : '' }}" id="ge.title" value="{{ old('ge.title') }}" placeholder="Service title">
                    	    @if ($errors->has('ge.title'))
                    	        <span class="parsley-errors-list filled" role="alert">
                    	            <strong class="parsley-required">
                    	            	{{ $errors->first('ge.title') }}
                    	            </strong>
                    	        </span>
                    	    @endif
                    	</div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">CREATE NEW</button>
                </form>
			</div>
		</div>
	</div>
@endsection