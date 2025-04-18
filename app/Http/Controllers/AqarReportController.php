<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AqarReportsModel;
use Illuminate\Support\Facades\Storage;

class AqarReportController extends Controller
{
    public function aqarReports_list()
    {
        $data['getRecords'] = AqarReportsModel::getRecords();
        return view('backend/IQAC/AqarReport/aqarReports_list',$data);
    }

    public function aqarReports_add()
    {
        return view('backend/IQAC/AqarReport/aqarReports_add');
    }

    public function aqarReports_insert(Request $request)
    {
        $request->validate([

            'title' => 'required|string',
            'pdf' => 'required|mimes:pdf|max:7168', // Max size 7MB

        ]);

         // Handle the PDF file upload

         $file = $request->file('pdf');
         $filename = trim($request->title); // Create a filename
         $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file

         AqarReportsModel::create([

                'title' => $request->title,
                'image_path' => $path,
            ]);
            return redirect('aqarReports_list')->with('success','AQAR Reports added successfully');
    }

    public function aqarReports_edit($id)
    {
        $data['getRecord'] = AqarReportsModel::getSingle($id);
        return view('backend/IQAC/AqarReport/aqarReports_edit',$data);
    }

    public function aqarReports_update($id, Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'pdf' => 'nullable|mimes:pdf|max:7168', // Max size 7MB, make it nullable for updates
        ]);

        // Find the existing record by its ID (assuming you pass the ID in the request)
        $aqarReports = AqarReportsModel::findOrFail($request->id);

        // Update the attributes
        $aqarReports->title = $request->title;

        // Handle the PDF file upload if a new file is provided
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = trim($request->title); // Create a filename
            $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file
            $aqarReports->image_path = $path; // Update the image path
        }

        // Save the updated record
        $aqarReports->save();
        return redirect('aqarReports_list')->with('success','AQAR Reports updated successfully');
    }

    public function aqarReports_delete($id)
    {
        $save = AqarReportsModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','AQAR Reports deleted successfully');
    }
}
