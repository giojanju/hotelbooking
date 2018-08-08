@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Services</h3>			
			</div>
			<div class="panel-body">
				<a type="button" href="{{ route('cp.services.create') }}" class="btn btn-info">Create new Services</a>
				<br>
				<br>
				@include('partials.success')
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Icon</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($services->count())
							@foreach($services as $service)
								<tr>
									<td width="10%">{{ $loop->iteration }}</td>
									<td width="30%">{{ str_limit(og($service, 'title'), 30, '...') }}</td>
									<td width="30%"><i class="{{ og($service, 'icon') }}"></i></td>
									<td width="30%">
										<a href="{{ route('cp.services.remove', [og($service, 'id')]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Remove</a>
										<a href="{{ route('cp.services.edit', ['id' => og($service, 'id')]) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
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