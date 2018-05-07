@extends('layout')

@section('title', 'Member List')

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
@endsection

@section('content')
	<div class="row">
		<div class="col" style="
			padding: 15px 10px 0px 10px;
			background: white;
			min-height: 580px;
			font-size: 12px;
		">
			<table id="example" class="table table-hover table-borderless table-responsive-sm" style="font-size: 12px;">
				<thead class="thead-light">
					<tr class="text-center">
						<!-- looping member column option -->
						@foreach($member_options as $option)
							<!-- is other option exist? -->
							@if(isset($option->other))
								<!-- decode json to object -->
								@php($other_options = json_decode($option->other))

								<!-- check hidden option -->
								@if(!isset($other_options->hidden) || !$other_options->hidden)
									<th>{{ $option->column_view }}</th>
								@endif
							@else
								<!-- print column view -->
								<th>{{ $option->column_view }}</th>
							@endif
						@endforeach

						<!-- action -->
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<!-- looping member (record) -->
					@foreach($members as $member)
						<tr>
							<!-- looping member column option  -->
							@foreach($member_options as $option)
								<!-- define field value -->
								@php($field_value = $member->{$option->column_name})

								<!-- is other option exist? -->
								@if(isset($option->other))
									<!-- decode json to object -->
									@php($other_options = json_decode($option->other))

									@switch($other_options->kind)
										@case('url')
											<!-- if not hidden -->
											@if(!$other_options->hidden)
												<td>{{ $field_value }}</td>
											@endif
											@break

										@case('date')
											<!-- use defined format -->
											<td>{{ date_format(date_create($field_value), $other_options->dateFormat) }}</td>
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
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewMemberModal" style="font-size: 11px;">View</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection

<!-- Modal -->
@include('viewMemberModal')

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
