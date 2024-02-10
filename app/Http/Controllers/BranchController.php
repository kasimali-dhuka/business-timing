<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Business;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(Business $business_id) {
        $branches = $business_id->branches;
        return view('pages.home', ['business' => $business_id, 'branches' => $branches]);
    }

    public function showAddBranch(Business $business_id) {
        return view('pages.branch.add', ['business' => $business_id]);
    }

    public function addBranch(Request $request, Business $business_id) {
        $validated = $request->validate([
            'branch_name' => 'required'
        ]);

        dd($validated);
    }

    public function deleteBranch(Request $request) {

    }
}
