@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Tour Days</h3>			
			</div>
			<div class="panel-body">
				<a type="button" href="{{ route('cp.days.create') }}" class="btn btn-info">Create new Day</a>
				<br>
				<br>
				@include('partials.success')
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Tour</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@if($days->count())
							@foreach($days as $day)
								<tr>
									<td width="10%">{{ $loop->iteration }}</td>
									<td width="30%">{{ og($day, 'title') }}</td>
									<td width="30%">{{ og($day->tour, 'title') }}</td>
									<td width="30%">
										<a href="{{ route('cp.days.remove', [og($day, 'id')]) }}" class="btn btn-danger"><i class="fa fa-trash-o"></i> Remove</a>
										<a href="{{ route('cp.days.edit', ['id' => og($day, 'id')]) }}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
									</td>
								</tr>
							@endforeach
						@endif
					</tbody>
				</table>
				{{ $days->links() }}
			</div>
		</div>
	</div>
@endsection