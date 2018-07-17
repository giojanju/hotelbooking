@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Tour Categories</h3>			
			</div>
			<div class="panel-body">
				@include('partials.success')
				<form method="POST" class="form-auth-small" action="{{ route('cp.days.update', [og($day, 'id')]) }}">
                    @csrf
						<div>
						  	<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								@foreach ($_locales as $local => $locale)
							    	<li 
							    		role="presentation" 
							    		class="{{ lang() == $local ? 'active' : '' }}"
							    	>
							    		<a 
							    			href="#{{ $local }}" 
							    			aria-controls="{{ $local }}" 
							    			role="tab" 
							    			data-toggle="tab"
							    		>
							    			<img width="30px" src="{{ asset('img/' . $locale['flag']) }}" alt=""> {{ $locale['name'] }}
							    		</a>
							    	</li>
	                            @endforeach
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								@foreach ($_locales as $local => $locale)
							    	<div role="tabpanel" class="tab-pane fade{{ lang() == $local ? ' in active' : '' }}" id="{{ $local }}">
							    		<div class="form-group">
					                        <label for="{{$local}}[title]" class="control-label sr-only">day title</label>
					                        <input 
					                        	type="text" 
					                        	name="{{$local}}[title]" 
					                        	class="form-control{{ $errors->has($local.'.title') ? ' parsley-error' : '' }}" 
					                        	id="{{$local}}[title]" 
					                        	value="{{ og($day->translate($local), 'title') }}" 
					                        	placeholder="Category title"
					                        >
					                        @if ($errors->has($local.'.title'))
					                            <span class="parsley-errors-list filled" role="alert">
					                                <strong class="parsley-required">{{ $errors->first($local.'.title') }}</strong>
					                            </span>
					                        @endif
					                    </div>

					                    <div class="form-group">
					                        <label 
					                        	for="{{$local}}[text]" 
					                        	class="control-label"
					                        >
					                    		Description
					                    	</label>
					                        <textarea 
					                        	type="text" 
					                        	name="{{$local}}[text]" 
					                        	class="form-control{{ $errors->has($local.'.text') ? ' parsley-error' : '' }}" 
					                        	id="{{$local}}[text]" 
					                        	rows="6"
					                        	placeholder="Description"
					                        >{{ og($day->translate($local), 'text') }}</textarea>
					                        @if ($errors->has($local.'.text'))
					                            <span class="parsley-errors-list filled" role="alert">
					                                <strong class="parsley-required">{{ $errors->first($local.'.text') }}</strong>
					                            </span>
					                        @endif
					                    </div>
							    	</div>
							    @endforeach
					    		<div class="form-group">
			                        <label for="name" class="control-label">Parent Category</label>
			                        <select name="tour_id" id="tour_id" class="form-control">
			                        	<option value="" >Select tour</option>
			                        	@foreach($tours as $tour)
			                        		<option 
			                        			value="{{ og($tour, 'id') }}"
			                        			{{ og($tour, 'id') == og($day, 'tour_id') ? 'selected' : '' }}
			                        		>
			                        			{{ og($tour, 'title') }}
			                        		</option>
			                        	@endforeach
			                        </select>
			                        @if ($errors->has('tour_id'))
			                            <span class="parsley-errors-list filled" role="alert">
			                                <strong class="parsley-required">{{ $errors->first('tour_id') }}</strong>
			                            </span>
			                        @endif
			                    </div>
							</div>
						</div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">UPDATE DAY</button>
                </form>
			</div>
		</div>
	</div>
@endsection