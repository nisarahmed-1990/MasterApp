<?php

namespace App\Http\Controllers;

use App\Models\ScstModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Use Str;

class ScstController extends Controller
{
    public function scstComm_list()
    {
        $data['getRecords'] = ScstModel::getRecords();
        return view('backend/committees/scstCell/scstComm_list',$data);
    }
    public function scstComm_add()
    {
        return view('backend/committees/scstCell/scstComm_add');
    }

    public function scstComm_insert(Request $request)
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

         ScstModel::create([

                'title' => $request->title,
                'vision' => $request->vision,
                'mission' => $request->mission,
                'objectives' => $request->objectives,
                'committee_convenor' => $request->committee_convenor,
                'committee_members' => $request->committee_members,
                'image_path' => $path,
            ]);
            return redirect('scstComm_list')->with('success','SC and ST Committee added successfully');

    }
    public function scstComm_edit($id)
    {
        $data['getRecord'] = ScstModel::getSingle($id);
        return view('backend/committees/scstCell/scstComm_edit',$data);
    }

    public function scstComm_update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'objectives' => 'required|string',
            'committee_convenor' => 'required|string',
            'committee_members' => 'required|string',
            'pdf' => 'nullable|mimes:pdf|max:7168', // Max size 7MB, make it nullable for updates
        ]);

        // Find the existing record by its ID (assuming you pass the ID in the request)
        $scstCommittee = ScstModel::findOrFail($request->id);

        // Update the attributes
        $scstCommittee->title = $request->title;
        $scstCommittee->vision = $request->vision;
        $scstCommittee->mission = $request->mission;
        $scstCommittee->objectives = $request->objectives;
        $scstCommittee->committee_convenor = $request->committee_convenor;
        $scstCommittee->committee_members = $request->committee_members;

        // Handle the PDF file upload if a new file is provided
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = trim($request->title); // Create a filename
            $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file
            $scstCommittee->image_path = $path; // Update the image path
        }

        // Save the updated record
        $scstCommittee->save();
        return redirect('scstComm_list')->with('success','SC and ST Committee updated successfully');
    }

    public function scstComm_delete($id)
    {
        $save = ScstModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','SC and ST Committee deleted successfully');
    }

}
