@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Tour Categories</h3>			
			</div>
			<div class="panel-body">
				@include('partials.success')
				<form method="POST" class="form-auth-small" action="{{ route('cp.categories.store') }}">
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
					                        <label for="{{$local}}[name]" class="control-label sr-only">Category title</label>
					                        <input type="text" name="{{$local}}[name]" class="form-control{{ $errors->has($local.'.name') ? ' parsley-error' : '' }}" id="{{$local}}[name]" value="{{ old($local.'.name') }}" placeholder="Category title">
					                        @if ($errors->has($local.'.name'))
					                            <span class="parsley-errors-list filled" role="alert">
					                                <strong class="parsley-required">{{ $errors->first($local.'.name') }}</strong>
					                            </span>
					                        @endif
					                    </div>
							    	</div>
							    @endforeach
					    		<div class="form-group">
			                        <label for="name" class="control-label">Parent Category</label>
			                        <select name="parent_id" id="parent_id" class="form-control">
										<option value="null" selected disabled>Select parent category</option>
			                        	@foreach($categories as $category)
			                        		<option value="{{ og($category, 'id') }}">{{ og($category, 'name') }}</option>
			                        	@endforeach
			                        </select>
			                        @if ($errors->has('parent_id'))
			                            <span class="parsley-errors-list filled" role="alert">
			                                <strong class="parsley-required">{{ $errors->first('parent_id') }}</strong>
			                            </span>
			                        @endif
			                    </div>
							</div>
						</div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">CREATE NEW</button>
                </form>
			</div>
		</div>
	</div>
@endsection