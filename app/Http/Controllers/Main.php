<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;

// Model
use App\Member;
use App\Member_option;
use App\Option;

class Main extends Controller
{
	public function __invoke() {
		// retrieving members
		$members = Member::all();

		// retriving member column options
		$member_options = Member_option::all();

		// retriving options
		$options = (object) [
			'number_column' => Option::where('name', 'number_column')->first(),
			'number_column_name' => Option::where('name', 'number_column_name')->first()
		];

		return view('listMembers', [
			'members' => $members,
			'member_options' => $member_options,
			'options' => $options
		]);
	}

	public function viewMember($id_member) {
		// decrypting id member
		$id_member = decrypt($id_member);

		// retrieving members
		$member = Member::find($id_member);

		// retriving member column options
		$member_options = Member_option::all();

		// retriving options
		$options = (object) [
			'profile_picture' => Option::where('name', 'profile_picture')->first()
		];

		return view('viewMember', [
			'member' => $member,
			'member_options' => $member_options,
			'options' => $options
		]);
	}
}
