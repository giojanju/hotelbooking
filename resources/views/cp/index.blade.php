@extends('layouts.cp.app')

@section('content')
	<div class="container-fluid">
		<div class="panel panel-headline">
			<div class="panel-heading">
				<h3 class="panel-title">Overview</h3>			
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-list"></i></span>
							<p>
								<span class="number">1,252</span>
								<span class="title">Categories</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-rocket"></i></span>
							<p>
								<span class="number">203</span>
								<span class="title">Tours</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-map"></i></span>
							<p>
								<span class="number">274,678</span>
								<span class="title">All tour days</span>
							</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="metric">
							<span class="icon"><i class="fa fa-bar-chart"></i></span>
							<p>
								<span class="number">35%</span>
								<span class="title">Conversions</span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection