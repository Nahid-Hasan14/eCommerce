<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{

    public function profile () {
        //For Register User Address Find
        $data['customer'] = auth('customer')->user();

        $data['addresses'] = DB::table('addresses as a')
        ->join('divisions as d', 'd.id', 'a.division')
        ->join('districts as dc', 'dc.id', 'a.district')
        ->join('upazilas as u', 'u.id', 'a.upazila')
        ->select('a.phone', 'a.address', 'd.name as division', 'dc.name as district', 'u.name as upazila', )
        ->where('a.customer_id', auth('customer')->id())->get();

        return view('frontend.pages.profile', compact('data'));
    }
}
