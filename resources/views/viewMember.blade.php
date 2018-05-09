@extends('layout')

@section('title', 'View Member')

@section('content')
	<!-- content container -->
	<div class="row" style="min-height: 640px; font-size: 12px;">
		<div class="container">
			<!-- profile picture -->
			@if($options['profile_picture'] === 'enabled')
				<div class="row">
					<div class="col text-center" style="padding: 30px 10px 0px 10px;">
						<img src="https://lorempixel.com/200/200/people/?52984" alt="" class="rounded">
					</div>
				</div>
			@endif

			<!-- profile descriptions -->
			<div class="row justify-content-center">
				<div class="col-11 col-sm-9 col-md-7 col-lg-5" style="padding: 30px 10px 0px 10px;">
					<table id="example" class="table table-hover" style="font-size: 12px;">
						<tbody>
							<!-- looping column option -->
							@foreach($member_options as $key => $column_option)
								<tr>
									<td>{{ $column_option->column_view }}</td>

									<!-- define value -->
									@php($value = $member->{$column_option->column_name})

									<!-- is as exist? -->
									@if(isset($column_option->as))
										@switch($column_option->as)
											@case('date')
												<!-- use defined format -->
												@php($dateFormat = json_decode($column_option->other)->dateFormat)
												<td>{{ date_format(date_create($value), $dateFormat) }}</td>
											@break

											@default
												<td>{{ $value }}</td>
										@endswitch
									@else
										<td>{{ $value }}</td>
									@endif
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
