@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Tours</h3>			
			</div>
			<div class="panel-body">
				<a type="button" href="{{ route('cp.tours.create') }}" class="btn btn-info">Create new Tour</a>
				<br>
				<br>
				@include('partials.success')
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Sub Title</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($tours->count())
							@foreach($tours as $tour)
								<tr>
									<td width="10%">{{ $loop->iteration }}</td>
									<td width="20%">{{ og($tour, 'title') }}</td>
									<td width="20%">{{ og($tour, 'sub_title') }}</td>
									<td width="20%">{{ og($tour, 'price') }}</td>
									<td width="30%">
										<a href="{{ route('cp.tours.remove', [og($tour, 'id')]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Remove</a>
										<a href="{{ route('cp.tours.edit', ['id' => og($tour, 'id')]) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
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