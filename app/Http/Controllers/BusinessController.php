<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index() {
        return view('pages.home');
    }

    public function showAddBusiness() {
        return view('pages.business.add');
    }

    public function addBusiness(Request $request) {
        $validated = $request->validate([
            'business_name' => 'required',
            'business_email' => 'required|email',
            'business_phone' => 'required|max:10',
            'business_logo' => 'required|image',
        ]);

        $valid_data = [
            'name' => $validated['business_name'],
            'email' => $validated['business_email'],
            'phone' => $validated['business_phone'],
            'logo' => null
        ];

        if($request->hasfile('business_logo'))
        {
            $file = $request->file('business_logo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/business-logo/', $filename);
            $valid_data['logo'] = $filename;
        }

        $business = Business::create($valid_data);

        return redirect(route('branch.add', ['business_id' => $business->id]));
    }

    public function deleteBusiness(Request $request, Business $business) {

    }
}
