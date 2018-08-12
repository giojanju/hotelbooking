@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Tour services</h3>			
			</div>
			<div class="panel-body">
				@include('partials.success')
				<form method="POST" class="form-auth-small" enctype="multipart/form-data" action="{{ route('cp.hotels.store') }}" >
                    @csrf
		    		<div class="form-group">
                        <label for="ge.name" class="control-label sr-only">Service name</label>
                        <input type="text" name="ge[name]" class="form-control{{ $errors->has('ge.name') ? ' parsley-error' : '' }}" id="ge.name" value="{{ old('ge.name') }}" placeholder="Service name">
                        @if ($errors->has('ge.name'))
                            <span class="parsley-errors-list filled" role="alert">
                                <strong class="parsley-required">
                                	{{ $errors->first('ge.name') }}
                                </strong>
                            </span>
                        @endif
                    </div>
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
                    <div class="form-group">
                        <label for="ge.description" class="control-label sr-only">description</label>
                        <textarea class="form-control" rows="8" name="ge.description" id="ge.description">{{ old('ge.description') }}</textarea>
                        @if ($errors->has('ge.description'))
                            <span class="parsley-errors-list filled" role="alert">
                                <strong class="parsley-required">
                                	{{ $errors->first('ge.description') }}
                                </strong>
                            </span>
                        @endif
                    </div>
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
                    <label for="services">Hotel services</label>
                    <div class="row">
	                    @foreach($hotel_services as $service)
	                    	<div class="col-md-4">
	                    		<div class="form-group">
			                    	<label class="fancy-checkbox">
										<input name="hotel_services[]" value="{{ og($service, 'id') }}" type="checkbox">
										<span>{{ og($service, 'title') }}</span>
									</label>	
			                    </div>
	                    	</div>
	                    @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">CREATE NEW</button>
                </form>
			</div>
		</div>
	</div>
@endsection