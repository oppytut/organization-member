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
		$member_options = Member_option::where('hide_at_list', 0)
			->orWhere('hide_at_list', NULL)
			->get();

		// retriving options
		$options = Option::where('page', 'list_member')
			->pluck('value', 'name'); // as array

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
		$member_options = Member_option::where('hide_at_view', 0)
			->orWhere('hide_at_view', NULL)
			->get();

		// retriving options
		$options = Option::where('page', 'view_member')
			->pluck('value', 'name'); // as array

		return view('viewMember', [
			'member' => $member,
			'member_options' => $member_options,
			'options' => $options
		]);
	}
}
