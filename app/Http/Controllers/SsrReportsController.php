<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SsrReportsModel;
use Illuminate\Support\Facades\Storage;

class SsrReportsController extends Controller
{
    public function ssrReports_list()
    {
        $data['getRecords'] = SsrReportsModel::getRecords();
        return view('backend/IQAC/ssrReport/ssrReports_list',$data);
    }

    public function ssrReports_add()
    {
        return view('backend/IQAC/ssrReport/ssrReports_add');
    }

    public function ssrReports_insert(Request $request)
    {
        $request->validate([

            'title' => 'required|string',
            'pdf' => 'required|mimes:pdf|max:7168', // Max size 7MB

        ]);

         // Handle the PDF file upload

         $file = $request->file('pdf');
         $filename = trim($request->title); // Create a filename
         $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file

         SsrReportsModel::create([

                'title' => $request->title,
                'image_path' => $path,
            ]);
            return redirect('ssrReports_list')->with('success','SSR Reports added successfully');
    }
    public function ssrReports_edit($id)
    {
        $data['getRecord'] = SsrReportsModel::getSingle($id);
        return view('backend/IQAC/ssrReport/ssrReports_edit',$data);
    }

    public function ssrReports_update($id, Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'pdf' => 'nullable|mimes:pdf|max:7168', // Max size 7MB, make it nullable for updates
        ]);

        // Find the existing record by its ID (assuming you pass the ID in the request)
        $ssrReports = SsrReportsModel::findOrFail($request->id);

        // Update the attributes
        $ssrReports->title = $request->title;

        // Handle the PDF file upload if a new file is provided
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = trim($request->title); // Create a filename
            $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file
            $ssrReports->image_path = $path; // Update the image path
        }

        // Save the updated record
        $ssrReports->save();
        return redirect('ssrReports_list')->with('success','SSR Reports updated successfully');
    }
    public function ssrReports_delete($id)
    {
        $save = SsrReportsModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','SSR Reports deleted successfully');
    }

}
