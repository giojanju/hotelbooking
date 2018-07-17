@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Our hotels</h3>			
			</div>
			<div class="panel-body">
				<a type="button" href="{{ route('cp.hotels.create') }}" class="btn btn-info">Create new Hotel</a>
				<br>
				<br>
				@include('partials.success')
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Description</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($hotels->count())
							@foreach($hotels as $hotel)
								<tr>
									<td width="10%">{{ $loop->iteration }}</td>
									<td width="30%">{{ og($hotel, 'title') }}</td>
									<td width="30%">{{ str_limit(og($hotel, 'text'), 50, '..') }}</td>
									<td width="30%">
										<a href="{{ route('cp.hotels.remove', [og($hotel, 'id')]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Remove</a>
										<a href="{{ route('cp.hotels.edit', ['id' => og($hotel, 'id')]) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
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