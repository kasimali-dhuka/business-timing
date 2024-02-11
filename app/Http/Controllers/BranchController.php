<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'branch_name' => 'required',
            'branch_images' => 'required',
            'branch_images.*' => 'required|image|mimes:png,jpg,jpeg,gif,svg',
            'sunday_start_time.*' => 'nullable|date_format:H:i',
            'sunday_end_time.*' => 'nullable|date_format:H:i',
            'monday_start_time.*' => 'nullable|date_format:H:i',
            'monday_end_time.*' => 'nullable|date_format:H:i',
            'tuesday_start_time.*' => 'nullable|date_format:H:i',
            'tuesday_end_time.*' => 'nullable|date_format:H:i',
            'wednesday_start_time.*' => 'nullable|date_format:H:i',
            'wednesday_end_time.*' => 'nullable|date_format:H:i',
            'thursday_start_time.*' => 'nullable|date_format:H:i',
            'thursday_end_time.*' => 'nullable|date_format:H:i',
            'friday_start_time.*' => 'nullable|date_format:H:i',
            'friday_end_time.*' => 'nullable|date_format:H:i',
            'saturday_start_time.*' => 'nullable|date_format:H:i',
            'saturday_end_time.*' => 'nullable|date_format:H:i',
        ]);

        $inserting_data = [
            'business_id' => $business_id->id,
            'name' => $validated['branch_name'],
            'images' => [],
            'sunday_time' => json_encode([
                'start' => $validated['sunday_start_time'] ?? null,
                'end' => $validated['sunday_end_time'] ?? null,
            ]),
            'monday_time' => json_encode([
                'start' => $validated['monday_start_time'] ?? null,
                'end' => $validated['monday_end_time'] ?? null,
            ]),
            'tuesday_time' => json_encode([
                'start' => $validated['tuesday_start_time'] ?? null,
                'end' => $validated['tuesday_end_time'] ?? null,
            ]),
            'wednesday_time' => json_encode([
                'start' => $validated['wednesday_start_time'] ?? null,
                'end' => $validated['wednesday_end_time'] ?? null,
            ]),
            'thursday_time' => json_encode([
                'start' => $validated['thursday_start_time'] ?? null,
                'end' => $validated['thursday_end_time'] ?? null,
            ]),
            'friday_time' => json_encode([
                'start' => $validated['friday_start_time'] ?? null,
                'end' => $validated['friday_end_time'] ?? null,
            ]),
            'saturday_time' => json_encode([
                'start' => $validated['saturday_start_time'] ?? null,
                'end' => $validated['saturday_end_time'] ?? null,
            ]),
        ];

        if ($request->hasFile('branch_images')) {
            foreach ($request->file('branch_images') as $image) {
                $filename = Str::slug($business_id->name) . '_' . Str::slug($inserting_data['name']) . '_' . $image->getClientOriginalName();
                $image->storeAs('public/branch-images/', $filename);
                array_push($inserting_data['images'], $filename);
            }
        }

        $inserting_data['images'] = json_encode($inserting_data['images']);

        Branch::create($inserting_data);

        return back()->with('success', 'Branch Successfully Created');
    }

    public function deleteBranch(Request $request) {

    }
}
