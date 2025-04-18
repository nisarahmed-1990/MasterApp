<?php

namespace App\Http\Controllers;

use App\Models\ArcModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Use Str;

class ArcController extends Controller
{
    public function arc_list()
    {
        $data['getRecords'] = ArcModel::getRecords();
        return view('backend/committees/antirc/arc_list',$data);
    }

    public function arc_add()
    {
        return view('backend/committees/antirc/arc_add');
    }

    public function arc_insert(Request $request)
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

         ArcModel::create([

                'title' => $request->title,
                'vision' => $request->vision,
                'mission' => $request->mission,
                'objectives' => $request->objectives,
                'committee_convenor' => $request->committee_convenor,
                'committee_members' => $request->committee_members,
                'image_path' => $path,
            ]);
            return redirect('arc_list')->with('success','Anit Ragging Committee added successfully');
    }

    public function arc_edit($id)
    {
        $data['getRecord'] = ArcModel::getSingle($id);
        return view('backend/committees/antirc/arc_edit',$data);
    }

    public function arc_update($id, Request $request)
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
        $arc = ArcModel::findOrFail($request->id);

        // Update the attributes
        $arc->title = $request->title;
        $arc->vision = $request->vision;
        $arc->mission = $request->mission;
        $arc->objectives = $request->objectives;
        $arc->committee_convenor = $request->committee_convenor;
        $arc->committee_members = $request->committee_members;

        // Handle the PDF file upload if a new file is provided
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = trim($request->title); // Create a filename
            $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file
            $arc->image_path = $path; // Update the image path
        }

        // Save the updated record
        $arc->save();
        return redirect('arc_list')->with('success','Anit Ragging Committee updated successfully');
    }

    public function arc_delete($id)
    {
        $save = ArcModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Anit Ragging Committee deleted successfully');
    }
}
