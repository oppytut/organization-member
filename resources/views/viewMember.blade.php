@extends('layout')

@section('title', 'View Member')

@section('content')
	<!-- content container -->
	<div class="row" style="min-height: 640px; font-size: 12px;">
		<div class="container">
			<div class="row">
				<div class="col text-center" style="padding: 20px 10px 0px 10px;">
					<img src="{{ $member-> }}" alt="" class="rounded">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-6" style="padding: 20px 10px 0px 10px;">
					<table id="example" class="table table-hover" style="font-size: 12px;">
						<tbody>
							<tr>
								<td>Nama</td>
								<td>Arief Novianto</td>
							</tr>
							<tr>
								<td>NIM</td>
								<td>1304482</td>
							</tr>
							<tr>
								<td>Universitas</td>
								<td>Universitas Pendidikan Indonesia</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
