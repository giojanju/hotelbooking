@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Modify tour</h3>			
			</div>
			<div class="panel-body">
				@include('partials.success')
				<form method="POST" class="form-auth-small" enctype="multipart/form-data" action="{{ route('cp.tours.update', og($tour, 'id')) }}">
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
					                        	value="{{ og($tour->translate($local), 'title') }}" 
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
					                        	for="{{$local}}[sub_title]" 
					                        	class="control-label sr-only"
					                        >
					                    		Sub Title
					                    	</label>
					                        <input 
					                        	type="text" 
					                        	name="{{$local}}[sub_title]" 
					                        	class="form-control{{ $errors->has($local.'.sub_title') ? ' parsley-error' : '' }}" 
					                        	id="{{$local}}[sub_title]" 
					                        	value="{{ og($tour->translate($local), 'sub_title') }}" 
					                        	placeholder="Sub Title"
					                        >
					                        @if ($errors->has($local.'.sub_title'))
					                            <span class="parsley-errors-list filled" role="alert">
					                                <strong class="parsley-required">{{ $errors->first($local.'.sub_title') }}</strong>
					                            </span>
					                        @endif
					                    </div>

					                    <div class="form-group">
					                        <label 
					                        	for="{{$local}}[price]" 
					                        	class="control-label sr-only"
					                        >
					                    		Price
					                    	</label>
					                        <input 
					                        	type="text" 
					                        	name="{{$local}}[price]" 
					                        	class="form-control{{ $errors->has($local.'.price') ? ' parsley-error' : '' }}" 
					                        	id="{{$local}}[price]" 
					                        	value="{{ og($tour->translate($local), 'price') }}" 
					                        	placeholder="Price"
					                        >
					                        @if ($errors->has($local.'.price'))
					                            <span class="parsley-errors-list filled" role="alert">
					                                <strong class="parsley-required">{{ $errors->first($local.'.price') }}</strong>
					                            </span>
					                        @endif
					                    </div>

					                    <div class="form-group">
					                        <label 
					                        	for="{{$local}}[price_include]" 
					                        	class="control-label sr-only"
					                        >
					                    		Price include
					                    	</label>
					                        <input 
					                        	type="text" 
					                        	name="{{$local}}[price_include]" 
					                        	class="form-control{{ $errors->has($local.'.price_include') ? ' parsley-error' : '' }}" 
					                        	id="{{$local}}[price_include]" 
					                        	value="{{ og($tour->translate($local), 'price_include') }}" 
					                        	placeholder="Price include"
					                        >
					                        @if ($errors->has($local.'.price_include'))
					                            <span class="parsley-errors-list filled" role="alert">
					                                <strong class="parsley-required">{{ $errors->first($local.'.price_include') }}</strong>
					                            </span>
					                        @endif
					                    </div>

					                    <div class="form-group">
					                        <label 
					                        	for="{{$local}}[price_notinclude]" 
					                        	class="control-label sr-only"
					                        >
					                    		Price not include
					                    	</label>
					                        <input 
					                        	type="text" 
					                        	name="{{$local}}[price_notinclude]" 
					                        	class="form-control{{ $errors->has($local.'.price_notinclude') ? ' parsley-error' : '' }}" 
					                        	id="{{$local}}[price_notinclude]" 
					                        	value="{{ og($tour->translate($local), 'price_notinclude') }}" 
					                        	placeholder="Price not include"
					                        >
					                        @if ($errors->has($local.'.price_notinclude'))
					                            <span class="parsley-errors-list filled" role="alert">
					                                <strong class="parsley-required">{{ $errors->first($local.'.price_notinclude') }}</strong>
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
					                        >{{ og($tour->translate($local), 'description') }}</textarea>
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
			                        	for="image" 
			                        	class="control-label"
			                        >
			                    		Upload image
			                    	</label>
							    	<div class="ant-form-item-control-wrapper">
								    	<div class="ant-form-item-control">
								    		<span class="avatar-uploader">
								    			<div class="ant-upload ant-upload-select ant-upload-select-picture-card">
								    				<span 
								    					class="ant-upload get-image" 
								    					role="button" 
								    					tabindex="0"
								    					style="background-image: url('{{ $tour->getFirstMediaUrl('cover')  }}')" 
								    				>
								    					<input type="file" name="image" id="image" accept="" style="opcity: 0">
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

					    		<div class="form-group">
			                        <label for="menu_id" class="control-label">Select category</label>
			                        <select name="menu_id" id="menu_id" class="form-control">
										<option value="" >Select category(empty)</option>
			                        	@foreach($categories as $category)
			                        		<option 
			                        			value="{{ og($category, 'id') }}"
			                        			{{ og($category, 'id') == og($tour, 'menu_id') ? 'selected' : '' }}
			                        		>
			                        			{{ og($category, 'name') }}
			                        		</option>
			                        	@endforeach
			                        </select>
			                        @if ($errors->has('menu_id'))
			                            <span class="parsley-errors-list filled" role="alert">
			                                <strong class="parsley-required">{{ $errors->first('menu_id') }}</strong>
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