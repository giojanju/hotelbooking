@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Create new tour</h3>			
			</div>
			<div class="panel-body">
				@include('partials.success')
				<form method="POST" class="form-auth-small" enctype="multipart/form-data" action="{{ route('cp.modules.car_categories.store') }}">
                    @csrf
						<div>
						  	<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								@foreach ($_locales as $local => $locale)
							    	<li role="presentation" class="{{ lang() == $local ? 'active' : '' }}"><a href="#{{ $local }}" aria-controls="{{ $local }}" role="tab" data-toggle="tab"><img width="30px" src="{{ asset('img/' . $locale['flag']) }}" alt=""> {{ $locale['name'] }}</a></li>
	                            @endforeach
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								@foreach ($_locales as $local => $locale)
							    	<div role="tabpanel" class="tab-pane fade{{ lang() == $local ? ' in active' : '' }}" id="{{ $local }}">
							    		<div class="form-group">
					                        <label 
					                        	for="{{$local}}[title]" 
					                        	class="control-label sr-only"
					                        >
					                    		Title
					                    	</label>
					                        <input 
					                        	type="text" 
					                        	name="{{$local}}[title]" 
					                        	class="form-control{{ $errors->has($local.'.title') ? ' parsley-error' : '' }}" 
					                        	id="{{$local}}[title]" 
					                        	value="{{ old($local.'.title') }}" 
					                        	placeholder="Title"
					                        >
					                        @if ($errors->has($local.'.title'))
					                            <span class="parsley-errors-list filled" role="alert">
					                                <strong class="parsley-required">{{ $errors->first($local.'.title') }}</strong>
					                            </span>
					                        @endif
					                    </div>
							    	</div>
							    @endforeach							    
							</div>
						</div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">CREATE NEW</button>
                </form>
			</div>
		</div>
	</div>
@endsection