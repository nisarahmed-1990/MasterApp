<?php

namespace App\Http\Controllers;

use App\Models\AshcModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AshcController extends Controller
{
    public function ashc_list()
    {
        $data['getRecords'] = AshcModel::getRecords();
        return view('backend/committees/antiragging/ashc_list',$data);
    }

    public function ashc_add()
    {
        return view('backend/committees/antiragging/ashc_add');
    }

    public function ashc_insert(Request $request)
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

         AshcModel::create([

                'title' => $request->title,
                'vision' => $request->vision,
                'mission' => $request->mission,
                'objectives' => $request->objectives,
                'committee_convenor' => $request->committee_convenor,
                'committee_members' => $request->committee_members,
                'image_path' => $path,
            ]);
            return redirect('ashc_list')->with('success','Anit Sexual Harassment Cell added successfully');
    }
    public function ashc_edit($id)
    {
        $data['getRecord'] = AshcModel::getSingle($id);
        return view('backend/committees/antiragging/ashc_edit',$data);
    }

    public function ashc_update($id, Request $request)
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
        $ashc = AshcModel::findOrFail($request->id);

        // Update the attributes
        $ashc->title = $request->title;
        $ashc->vision = $request->vision;
        $ashc->mission = $request->mission;
        $ashc->objectives = $request->objectives;
        $ashc->committee_convenor = $request->committee_convenor;
        $ashc->committee_members = $request->committee_members;

        // Handle the PDF file upload if a new file is provided
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = trim($request->title); // Create a filename
            $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file
            $ashc->image_path = $path; // Update the image path
        }

        // Save the updated record
        $ashc->save();
        return redirect('ashc_list')->with('success','Anit Sexual Harassment Cell updated successfully');
    }

    public function ashc_delete($id)
    {
        $save = AshcModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Anit Sexual Harassment Cell deleted successfully');
    }
}
