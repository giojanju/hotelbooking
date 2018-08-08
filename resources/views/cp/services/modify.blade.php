@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Services</h3>			
			</div>
			<div class="panel-body">
				@include('partials.success')
				<form method="POST" class="form-auth-small" action="{{ route('cp.services.update', [og($service, 'id')]) }}">
                    @csrf
						<div class="form-group">
	                        <label for="ge.title" class="control-label sr-only">Service title</label>
	                        <input type="text" name="ge[title]" class="form-control{{ $errors->has('ge.title') ? ' parsley-error' : '' }}" id="ge.title" value="{{ og($service, 'title') }}" placeholder="Service title">
	                        @if ($errors->has('ge.title'))
	                            <span class="parsley-errors-list filled" role="alert">
	                                <strong class="parsley-required">
	                                	{{ $errors->first('ge.title') }}
	                                </strong>
	                            </span>
	                        @endif
	                    </div>
	                    <div class="form-group">
	                        <label for="icon" class="control-label sr-only">Service title</label>
	                        <input type="text" name="icon" class="form-control{{ $errors->has('icon') ? ' parsley-error' : '' }}" id="icon" value="{{ og($service, 'icon') }}" placeholder="Service title">
	                        @if ($errors->has('icon'))
	                            <span class="parsley-errors-list filled" role="alert">
	                                <strong class="parsley-required">
	                                	{{ $errors->first('icon') }}
	                                </strong>
	                            </span>
	                        @endif
	                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">UPDATE CATEGORY</button>
                </form>
			</div>
		</div>
	</div>
@endsection