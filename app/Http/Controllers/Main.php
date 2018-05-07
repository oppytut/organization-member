<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Model
use App\Member;
use App\Member_option;

class Main extends Controller
{
	public function __invoke() {
		// retrieving members
		$members = Member::all();

		// retriving member column options
		$member_options = Member_option::all();

		return view('listMember', [
			'members' => $members,
			'member_options' => $member_options
		]);
	}
}
