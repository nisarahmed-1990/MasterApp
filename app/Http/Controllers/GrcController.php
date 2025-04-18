<?php

namespace App\Http\Controllers;

use App\Models\GrcModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Use Str;

class GrcController extends Controller
{
    public function grc_list()
    {
        $data['getRecords'] = GrcModel::getRecords();
        return view('backend/committees/grc/grc_list',$data);
    }

    public function grc_add()
    {
        return view('backend/committees/grc/grc_add');
    }

    public function grc_insert(Request $request)
    {
        $request->validate([

            'title' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'objectives' => 'nullable|string',
            'committee_convenor' => 'nullable|string',
            'committee_members' => 'nullable|string',
            'pdf' => 'required|mimes:pdf|max:7168', // Max size 7MB

        ]);

         // Handle the PDF file upload

         $file = $request->file('pdf');
         $filename = trim($request->title); // Create a filename
         $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file

         GrcModel::create([

                'title' => $request->title,
                'vision' => $request->vision,
                'mission' => $request->mission,
                'objectives' => $request->objectives,
                'committee_convenor' => $request->committee_convenor,
                'committee_members' => $request->committee_members,
                'image_path' => $path,
            ]);
            return redirect('grc_list')->with('success',' Grievance Redressal Committee added successfully');

    }


    public function grc_edit($id)
    {
        $data['getRecord'] = GrcModel::getSingle($id);
        return view('backend/committees/grc/grc_edit',$data);
    }

    public function grc_update($id, Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'objectives' => 'nullable|string',
            'committee_convenor' => 'nullable|string',
            'committee_members' => 'nullable|string',
            'pdf' => 'nullable|mimes:pdf|max:700000', // Max size 7MB, make it nullable for updates
        ]);

        // Find the existing record by its ID (assuming you pass the ID in the request)
        $grc = GrcModel::findOrFail($request->id);

        // Update the attributes
        $grc->title = $request->title;
        $grc->vision = $request->vision;
        $grc->mission = $request->mission;
        $grc->objectives = $request->objectives;
        $grc->committee_convenor = $request->committee_convenor;
        $grc->committee_members = $request->committee_members;

        // Handle the PDF file upload if a new file is provided
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = trim($request->title); // Create a filename
            $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file
            $grc->image_path = $path; // Update the image path
        }

        // Save the updated record
        $grc->save();
        return redirect('grc_list')->with('success','Grievance Redressal Committee updated successfully');
    }

    public function grc_delete($id)
    {
        $save = GrcModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Grievance Redressal Committee deleted successfully');
    }
}
