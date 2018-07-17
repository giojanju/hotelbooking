@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Cars</h3>			
			</div>
			<div class="panel-body">
				<a type="button" href="{{ route('cp.modules.cars.create') }}" class="btn btn-info">Create new Car</a>
				<br>
				<br>
				@include('partials.success')
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Price</th>
							<th>Category</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($cars->count())
							@foreach($cars as $car)
								<tr>
									<td width="10%">{{ $loop->iteration }}</td>
									<td width="20%">{{ og($car, 'title') }}</td>
									<td width="20%">{{ og($car, 'price') }}</td>
									<td width="20%">{{ og($car->carCategory, 'title') }}</td>
									<td width="30%">
										<a href="{{ route('cp.modules.cars.remove', [og($car, 'id')]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Remove</a>
										<a href="{{ route('cp.modules.cars.edit', ['id' => og($car, 'id')]) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
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