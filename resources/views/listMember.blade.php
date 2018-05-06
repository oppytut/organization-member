@extends('layout')

@section('title', 'Member List')

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
@endsection

@section('content')
	<div class="row">
		<div class="col" style="padding: 30px 10px 30px 10px; background: white; font-size: 13px; min-height: 650px;">
			<table id="example" class="table table-hover table-borderless table-responsive-sm">
				<thead class="thead-light">
					<tr>
						<!-- Looping columns -->
						@foreach($readable_member_columns as $column_name)
							<!-- Printing column name that not has ' Img' code -->
							@if(!(strpos($column_name, ' Img') !== false))
								<th>{{ $column_name }}</th>
							@endif
						@endforeach
					</tr>
				</thead>
				<tbody>
					<!-- Looping members data -->
					@foreach($members as $member)
						<tr>
							<!-- Looping columns -->
							@foreach($member_columns as $column_name)
								<!-- Printing column name that not has '_img' code -->
								@if(!(strpos($column_name, '_img') !== false))
									<td>{{ $member->{$column_name} }}</td>
								@endif
							@endforeach
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection

@section('js')
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable({
				"bInfo": false,
				"bLengthChange": false
			});
		});
	</script>
@endsection
