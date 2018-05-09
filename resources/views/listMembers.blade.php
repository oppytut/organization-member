@extends('layout')

@section('title', 'Member List')

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
@endsection

@section('content')
	<!-- content container -->
	<div class="row" style="min-height: 640px;">
		<div class="col" style="padding: 20px 10px 0px 10px; font-size: 12px;">
			<table id="example" class="table table-hover table-borderless table-responsive-sm">
				<thead class="thead-light text-center">
					<tr>
						<!-- column number -->
						@if($options['number_column'] === 'enabled')
							<th>{{ $options['number_column_name'] }}</th>
						@endif

						<!-- looping member column option -->
						@foreach($member_options as $column_option)
							<th>{{ $column_option->column_view }}</th>
						@endforeach

						<!-- action -->
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<!-- looping member (record) -->
					@foreach($members as $key => $member)
					<tr>
						<!-- column number -->
						@if($options['number_column'] === 'enabled')
							<td class="text-center">{{ $key + 1 }}</td>
						@endif

						<!-- looping member column option  -->
						@foreach($member_options as $column_option)
							<!-- define field value -->
							@php($field_value = $member->{$column_option->column_name})

							<!-- is as exist? -->
							@if(isset($column_option->as))
								@switch($column_option->as)
									@case('date')
										<!-- use defined format -->
										@php($dateFormat = json_decode($column_option->other)->dateFormat)
										<td>{{ date_format(date_create($field_value), $dateFormat) }}</td>
									@break

									@default
										<!-- by default, data is displayed -->
										<td>{{ $field_value }}</td>
								@endswitch
							@else
								<td>{{ $field_value }}</td>
							@endif
						@endforeach

						<!-- action -->
						<td class="text-center align-middle" style="padding: 5px;">
							<a href="/view-member/{{ encrypt($member->id) }}" role="button" class="btn btn-primary btn-sm" style="font-size: 11px;">View</a>
						</td>
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
