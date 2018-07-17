@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Tour Categories</h3>			
			</div>
			<div class="panel-body">
				<br>
				@include('partials.success')
				<h3>Create new slider</h3>
				<form method="POST" class="form-auth-small" enctype="multipart/form-data" action="{{ route('cp.sliders.store') }}">
                    @csrf
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
                    <button type="submit" class="btn btn-primary btn-lg btn-block">CREATE NEW</button>
                </form>
                <br><br>
                <h3>Slider list</h3>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($sliders->count())
							@foreach($sliders as $slider)
								<tr>
									<td width="10%">{{ $loop->iteration }}</td>
									<td width="30%">
										<img width="120px" src="{{ asset($slider->getFirstMediaUrl()) }}" alt="">
									</td>
									<td width="30%">
										<a href="{{ route('cp.sliders.remove', [og($slider, 'id')]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Remove</a>
									</td>
								</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection