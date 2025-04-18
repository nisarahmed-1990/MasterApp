<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutIqacModel;
use Illuminate\Support\Facades\Storage;
Use Str;

class AboutIqacController extends Controller
{
    public function aboutIqac_list()
    {
        $data['getRecords'] = AboutIqacModel::getRecords();
        return view('backend/IQAC/aboutIQAC/aboutIqac_list',$data);
    }

    public function aboutIqac_add()
    {
        return view('backend/IQAC/aboutIQAC/aboutIqac_add');
    }

    public function aboutIqac_insert(Request $request)
    {
        $request->validate([

            'title' => 'nullable|string',
            'aboutiqac' => 'nullable|string',
            'iqacestb' => 'nullable|string',
            'iqacco' => 'nullable|string',
            'iqacform' => 'nullable|string',
            'committee_members' => 'nullable|string',
            'pdf' => 'required|mimes:pdf|max:7168', // Max size 7MB

        ]);

         // Handle the PDF file upload

         $file = $request->file('pdf');
         $filename = trim($request->title); // Create a filename
         $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file

         AboutIqacModel::create([

                'title' => $request->title,
                'aboutiqac' => $request->aboutiqac,
                'iqacestb' => $request->iqacestb,
                'iqacco' => $request->iqacco,
                'iqacform' => $request->iqacform,
                'committee_members' => $request->committee_members,
                'image_path' => $path,
            ]);
            return redirect('aboutIqac_list')->with('success','About IQAC added successfully');
    }
    public function aboutIqac_edit($id)
    {
        $data['getRecord'] = AboutIqacModel::getSingle($id);
        return view('backend/IQAC/aboutIQAC/aboutIqac_edit',$data);
    }

    public function aboutIqac_update($id, Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'aboutiqac' => 'nullable|string',
            'iqacestb' => 'nullable|string',
            'iqacco' => 'nullable|string',
            'iqacform' => 'nullable|string',
            'committee_members' => 'nullable|string',
            'pdf' => 'nullable|mimes:pdf|max:7168', // Max size 7MB // Max size 7MB, make it nullable for updates
        ]);

        // Find the existing record by its ID (assuming you pass the ID in the request)
        $aboutIqac = AboutIqacModel::findOrFail($request->id);

        // Update the attributes
        $aboutIqac->title = $request->title;
        $aboutIqac->aboutiqac = $request->aboutiqac;
        $aboutIqac->iqacestb = $request->iqacestb;
        $aboutIqac->iqacco = $request->iqacco;
        $aboutIqac->iqacform = $request->iqacform;
        $aboutIqac->committee_members = $request->committee_members;

        // Handle the PDF file upload if a new file is provided
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = trim($request->title); // Create a filename
            $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file
            $aboutIqac->image_path = $path; // Update the image path
        }

        // Save the updated record
        $aboutIqac->save();
        return redirect('aboutIqac_list')->with('success','About IQAC updated successfully');
    }

    public function aboutIqac_delete($id)
    {
        $save = AboutIqacModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','About IQAC deleted successfully');
    }
}
