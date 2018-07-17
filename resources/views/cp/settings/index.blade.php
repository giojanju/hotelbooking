@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Tour Categories</h3>			
			</div>
			<div class="panel-body">
				@include('partials.success')
				<form method="POST" class="form-auth-small" enctype="multipart/form-data" action="{{ route('cp.settings.store') }}">
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
					                        <label for="site_title[locale][{{$local}}]" class="control-label">site title</label>
					                        <input type="text" name="site_title[locale][{{$local}}]" class="form-control" id="site_title[locale][{{$local}}]" 
					                        value="{{ get_setting('site_title', $local) }}">
					                    </div>

										<div class="form-group">
					                        <label for="about[locale][{{$local}}]" class="control-label">About</label>
					                        <textarea 
					                        	class="form-control" 
					                        	name="about[locale][{{$local}}]"
					                        	rows="8"
					                        >{{ get_setting('about', $local) }}</textarea>
					                    </div>

							    	</div>
							    @endforeach
							</div>
							<br>

							<div class="form-group">
						    	<label 
		                        	for="photo" 
		                        	class="control-label"
		                        >
		                    		Upload logo photo
		                    	</label>
						    	<input type="file" name="photo" id="photo">
						    </div>

		                    <div class="form-group">
		                        <label for="phone" class="control-label">Phone</label>
		                        <input type="text" name="phone" class="form-control" id="phone" value="{{ get_setting('phone') }}">
		                    </div>

		                    <div class="form-group">
		                        <label for="email" class="control-label">Email</label>
		                        <input type="text" name="email" class="form-control" id="email" value="{{ get_setting('email') }}">
		                    </div>

		                    <div class="form-group">
		                        <label for="address" class="control-label">address</label>
		                        <input type="text" name="address" class="form-control" id="address" value="{{ get_setting('address') }}">
		                    </div>

		                    <div class="form-group">
		                        <label for="facebook" class="control-label">facebook</label>
		                        <input type="text" name="facebook" class="form-control" id="facebook" value="{{ get_setting('facebook') }}">
		                    </div>

		                    <div class="form-group">
		                        <label for="google" class="control-label">google</label>
		                        <input type="text" name="google" class="form-control" id="google" value="{{ get_setting('google') }}">
		                    </div>

		                    <div class="form-group">
		                        <label for="twitter" class="control-label">twitter</label>
		                        <input type="text" name="twitter" class="form-control" id="twitter" value="{{ get_setting('twitter') }}">
		                    </div>

		                    <div class="form-group">
		                        <label for="instagram" class="control-label">instagram</label>
		                        <input type="text" name="instagram" class="form-control" id="instagram" value="{{ get_setting('instagram') }}">
		                    </div>
						</div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">UPDATE SETTINGS</button>
                </form>
			</div>
		</div>
	</div>
@endsection