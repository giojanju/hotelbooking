@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Create new car</h3>			
			</div>
			<div class="panel-body">
				@include('partials.success')
				<form method="POST" class="form-auth-small" enctype="multipart/form-data" action="{{ route('cp.modules.cars.store') }}">
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

					                    <div class="form-group">
					                        <label 
					                        	for="{{$local}}[description]" 
					                        	class="control-label"
					                        >
					                    		Description
					                    	</label>
					                        <textarea 
					                        	type="text" 
					                        	name="{{$local}}[description]" 
					                        	class="form-control{{ $errors->has($local.'.description') ? ' parsley-error' : '' }}" 
					                        	id="{{$local}}[description]" 
					                        	rows="6"
					                        	placeholder="Description"
					                        >{{ old($local.'.description') }}</textarea>
					                        @if ($errors->has($local.'.description'))
					                            <span class="parsley-errors-list filled" role="alert">
					                                <strong class="parsley-required">{{ $errors->first($local.'.description') }}</strong>
					                            </span>
					                        @endif
					                    </div>
							    	</div>
							    @endforeach
								
								<div class="form-group">
			                        <label 
			                        	for="price" 
			                        	class="control-label sr-only"
			                        >
			                    		Price
			                    	</label>
			                        <input 
			                        	type="text" 
			                        	name="price" 
			                        	class="form-control{{ $errors->has('price') ? ' parsley-error' : '' }}" 
			                        	id="price" 
			                        	value="{{ old('price') }}" 
			                        	placeholder="Price"
			                        >
			                        @if ($errors->has('price'))
			                            <span class="parsley-errors-list filled" role="alert">
			                                <strong class="parsley-required">{{ $errors->first('price') }}</strong>
			                            </span>
			                        @endif
			                    </div>

							    <div class="form-group">
							    	<label 
			                        	for="image" 
			                        	class="control-label"
			                        >
			                    		Upload image
			                    	</label>
							    	<div class="ant-form-item-control-wrapper">
								    	<div class="ant-form-item-control">
								    		<span class="avatar-uploader">
								    			<div class="ant-upload ant-upload-select ant-upload-select-picture-card">
								    				<span class="ant-upload get-image" role="button" tabindex="0">
								    					<input type="file" name="image" id="image" style="opcity: 0">
									    				<div>
									    					<i class="anticon lnr lnr-plus-circle"></i>
											    			<div class="ant-upload-text">Upload</div>
											    		</div>
											    	</span>
											    </div>
											</span>
										</div>
									</div>
							    </div>
								<br>
					    		<div class="form-group" style="margin-top: 150px">
			                        <label for="car_category_id" class="control-label">Select category</label>
			                        <select name="car_category_id" id="car_category_id" class="form-control">
										<option value="">Select category</option>
			                        	@foreach($categories as $category)
			                        		<option value="{{ og($category, 'id') }}">{{ og($category, 'title') }}</option>
			                        	@endforeach
			                        </select>
			                        @if ($errors->has('car_category_id'))
			                            <span class="parsley-errors-list filled" role="alert">
			                                <strong class="parsley-required">{{ $errors->first('car_category_id') }}</strong>
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