@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Add hotel</h3>			
			</div>
			<div class="panel-body">
				@include('partials.success')
				<h3>Create new hotel</h3>
				<form method="POST" class="form-auth-small" enctype="multipart/form-data" action="{{ route('cp.hotels.store') }}">
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
					                        <label for="{{$local}}[title]" class="control-label sr-only">Category title</label>
					                        <input type="text" name="{{$local}}[title]" class="form-control{{ $errors->has($local.'.title') ? ' parsley-error' : '' }}" id="{{$local}}[title]" value="{{ old($local.'.title') }}" placeholder="Category title">
					                        @if ($errors->has($local.'.title'))
					                            <span class="parsley-errors-list filled" role="alert">
					                                <strong class="parsley-required">{{ $errors->first($local.'.title') }}</strong>
					                            </span>
					                        @endif
					                    </div>

					                 	<div class="form-group">
					                        <label for="{{$local}}[text]" class="control-label sr-only">Category description</label>
					                        <textarea rows="7" placeholder="Hotel description" name="{{$local}}[text]" class="form-control{{ $errors->has($local.'.text') ? ' parsley-error' : '' }}">{{ old($local.'.text') }}</textarea>
					                        @if ($errors->has($local.'.text'))
					                            <span class="parsley-errors-list filled" role="alert">
					                                <strong class="parsley-required">{{ $errors->first($local.'.text') }}</strong>
					                            </span>
					                        @endif
					                    </div>
							    	</div>

							    @endforeach
					    		
			                    <div class="form-group image-container">
							    	<label 
			                        	for="image" 
			                        	class="control-label"
			                        >
			                    		Upload image
			                    	</label>
					    			<div style="overflow: hidden;" class="overflow-h">
					    				<div class="ant-upload ant-upload-select ant-upload-select-picture-card">
					    				<span class="ant-upload" role="button" tabindex="0">
					    					<input type="file" class="featured--image photos" name="image[]" accept="" style="opcity: 0">
						    				<div>
						    					<i class="anticon lnr lnr-plus-circle"></i>
								    			<div class="ant-upload-text">Upload</div>
								    		</div>
								    	</span>
								    </div>
								    <div class="ant-upload ant-upload-select ant-upload-select-picture-card">
					    				<span class="ant-upload" role="button" tabindex="0">
					    					<input type="file" class="featured--image photos" name="image[]" accept="" style="opcity: 0">
						    				<div>
						    					<i class="anticon lnr lnr-plus-circle"></i>
								    			<div class="ant-upload-text">Upload</div>
								    		</div>
								    	</span>
								    </div>
								    <div class="ant-upload ant-upload-select ant-upload-select-picture-card">
					    				<span class="ant-upload" role="button" tabindex="0">
					    					<input type="file" class="featured--image photos" name="image[]" accept="" style="opcity: 0">
						    				<div>
						    					<i class="anticon lnr lnr-plus-circle"></i>
								    			<div class="ant-upload-text">Upload</div>
								    		</div>
								    	</span>
								    </div>
								    <div class="ant-upload ant-upload-select ant-upload-select-picture-card">
					    				<span class="ant-upload" role="button" tabindex="0">
					    					<input type="file" class="featured--image photos" name="image[]" accept="" style="opcity: 0">
						    				<div>
						    					<i class="anticon lnr lnr-plus-circle"></i>
								    			<div class="ant-upload-text">Upload</div>
								    		</div>
								    	</span>
								    </div>
									<div class="ant-upload ant-upload-select ant-upload-select-picture-card">
					    				<span class="ant-upload" role="button" tabindex="0">
					    					<input type="file" class="featured--image photos" name="image[]" accept="" style="opcity: 0">
						    				<div>
						    					<i class="anticon lnr lnr-plus-circle"></i>
								    			<div class="ant-upload-text">Upload</div>
								    		</div>
								    	</span>
								    </div>

					    			</div>
								    
							    </div>
							    <br>
							    <br>
							</div>
						</div>
					
                    <button type="submit" class="btn btn-primary btn-lg btn-block">CREATE NEW</button>
                </form>
			</div>
		</div>
	</div>
@endsection