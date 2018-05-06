<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Model
use App\Member;

class Main extends Controller
{
	public function __invoke() {
		// Retrieving all members
		$members = Member::all();

		// Retriving all member column name
		$member_columns = DB::getSchemaBuilder()->getColumnListing('members');

		// Deleting sensitive column name
		foreach($member_columns as $key => $column_name) {
			if(in_array($column_name, [
				'id',
				'created_at',
				'updated_at',
				'deleted_at'
			])) {
				unset($member_columns[$key]);
			}
		}

		// Create readable member column
		$readable_member_columns = $member_columns;

		foreach ($readable_member_columns as $key => $column_name) {
			$readable_member_columns[$key] = ucwords(str_replace('_', ' ', $readable_member_columns[$key]));
		}

		return view('listMember', [
			'members' => $members,
			'member_columns' => $member_columns,
			'readable_member_columns' => $readable_member_columns
		]);
	}
}
