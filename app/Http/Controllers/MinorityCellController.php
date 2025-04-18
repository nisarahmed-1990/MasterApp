<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MinorityCellModel;
use Illuminate\Support\Facades\Storage;
Use Str;

class MinorityCellController extends Controller
{
    public function minorityCell_list()
    {
        $data['getRecords'] = MinorityCellModel::getRecords();
        return view('backend/committees/minorityCell/minorityCell_list',$data);
    }

    public function minorityCell_add()
    {
        return view('backend/committees/minorityCell/minorityCell_add');
    }

    public function minorityCell_insert(Request $request)
    {
        $request->validate([

            'title' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'objectives' => 'required|string',
            'committee_convenor' => 'required|string',
            'committee_members' => 'required|string',
            'pdf' => 'required|mimes:pdf|max:7168', // Max size 7MB

        ]);

         // Handle the PDF file upload

         $file = $request->file('pdf');
         $filename = trim($request->title); // Create a filename
         $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file

         MinorityCellModel::create([

                'title' => $request->title,
                'vision' => $request->vision,
                'mission' => $request->mission,
                'objectives' => $request->objectives,
                'committee_convenor' => $request->committee_convenor,
                'committee_members' => $request->committee_members,
                'image_path' => $path,
            ]);
            return redirect('minorityCell_list')->with('success','Minority Cell added successfully');
    }
    public function minorityCell_edit($id)
    {
        $data['getRecord'] = MinorityCellModel::getSingle($id);
        return view('backend/committees/minorityCell/minorityCell_edit',$data);
    }

    public function minorityCell_update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'objectives' => 'required|string',
            'committee_convenor' => 'required|string',
            'committee_members' => 'required|string',
            'pdf' => 'nullable|mimes:pdf|max:700000', // Max size 7MB, make it nullable for updates
        ]);

        // Find the existing record by its ID (assuming you pass the ID in the request)
        $minorityCell = MinorityCellModel::findOrFail($request->id);

        // Update the attributes
        $minorityCell->title = $request->title;
        $minorityCell->vision = $request->vision;
        $minorityCell->mission = $request->mission;
        $minorityCell->objectives = $request->objectives;
        $minorityCell->committee_convenor = $request->committee_convenor;
        $minorityCell->committee_members = $request->committee_members;

        // Handle the PDF file upload if a new file is provided
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = trim($request->title); // Create a filename
            $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file
            $minorityCell->image_path = $path; // Update the image path
        }

        // Save the updated record
        $minorityCell->save();
        return redirect('minorityCell_list')->with('success','Minority Cell updated successfully');
    }

    public function minorityCell_delete($id)
    {
        $save = MinorityCellModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Minority Cell deleted successfully');
    }
}
