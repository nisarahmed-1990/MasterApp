<?php

namespace App\Http\Controllers;

use App\Models\WecModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
Use Str;

class WecController extends Controller
{
    public function wec_list()
    {
        $data['getRecords'] = WecModel::getRecords();
        return view('backend/committees/womenEC/wec_list',$data);
    }

    public function wec_add()
    {
        return view('backend/committees/womenEC/wec_add');
    }

    public function wec_insert(Request $request)
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

         WecModel::create([

                'title' => $request->title,
                'vision' => $request->vision,
                'mission' => $request->mission,
                'objectives' => $request->objectives,
                'committee_convenor' => $request->committee_convenor,
                'committee_members' => $request->committee_members,
                'image_path' => $path,
            ]);
            return redirect('wec_list')->with('success','Women Empowerment Cell added successfully');
    }

    public function wec_edit($id)
    {
        $data['getRecord'] = WecModel::getSingle($id);
        return view('backend/committees/womenEC/wec_edit',$data);
    }

    public function wec_update($id, Request $request)
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
        $wec = WecModel::findOrFail($request->id);

        // Update the attributes
        $wec->title = $request->title;
        $wec->vision = $request->vision;
        $wec->mission = $request->mission;
        $wec->objectives = $request->objectives;
        $wec->committee_convenor = $request->committee_convenor;
        $wec->committee_members = $request->committee_members;

        // Handle the PDF file upload if a new file is provided
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = trim($request->title); // Create a filename
            $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file
            $wec->image_path = $path; // Update the image path
        }

        // Save the updated record
        $wec->save();
        return redirect('wec_list')->with('success','Women Empowerment Cell updated successfully');
    }

    public function wec_delete($id)
    {
        $save = WecModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Women Empowerment Cell deleted successfully');
    }
}
