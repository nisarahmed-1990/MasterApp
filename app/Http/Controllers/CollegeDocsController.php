<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CollegeDocsModel;
use Illuminate\Support\Facades\Storage;

class CollegeDocsController extends Controller
{
    public function collegeDocs_list()
    {
        $data['getRecords'] = CollegeDocsModel::getRecords();
        return view('backend/NAAC/collegeDocs/collegeDocs_list',$data);
    }

    public function collegeDocs_add()
    {
        return view('backend/NAAC/collegeDocs/collegeDocs_add');
    }

    public function collegeDocs_insert(Request $request)
    {
        $request->validate([

            'title' => 'required|string',
            'pdf' => 'required|mimes:pdf|max:7168', // Max size 7MB

        ]);

         // Handle the PDF file upload

         $file = $request->file('pdf');
         $filename = trim($request->title); // Create a filename
         $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file

         CollegeDocsModel::create([

                'title' => $request->title,
                'image_path' => $path,
            ]);
            return redirect('collegeDocs_list')->with('success','Document added successfully');
    }

    public function collegeDocs_edit($id)
    {
        $data['getRecord'] = CollegeDocsModel::getSingle($id);
        return view('backend/NAAC/collegeDocs/collegeDocs_edit',$data);
    }

    public function collegeDocs_update($id, Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'pdf' => 'nullable|mimes:pdf|max:7168', // Max size 7MB, make it nullable for updates
        ]);

        // Find the existing record by its ID (assuming you pass the ID in the request)
        $collegeDocs = CollegeDocsModel::findOrFail($request->id);

        // Update the attributes
        $collegeDocs->title = $request->title;

        // Handle the PDF file upload if a new file is provided
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = trim($request->title); // Create a filename
            $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file
            $collegeDocs->image_path = $path; // Update the image path
        }

        // Save the updated record
        $collegeDocs->save();
        return redirect('collegeDocs_list')->with('success','Document updated successfully');
    }

    public function collegeDocs_delete($id)
    {
        $save = CollegeDocsModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Document deleted successfully');
    }
}
