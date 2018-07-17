@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Tour Categories</h3>			
			</div>
			<div class="panel-body">
				<a type="button" href="{{ route('cp.categories.create') }}" class="btn btn-info">Create new Category</a>
				<br>
				<br>
				@include('partials.success')
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Parent</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($categories->count())
							@foreach($categories as $category)
								<tr>
									<td width="10%">{{ $loop->iteration }}</td>
									<td width="30%">{{ og($category, 'name') }}</td>
									<td width="30%">{{ $category->parent['name'] }}</td>
									<td width="30%">
										<a href="{{ route('cp.categories.remove', [og($category, 'id')]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Remove</a>
										<a href="{{ route('cp.categories.edit', ['id' => og($category, 'id')]) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
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