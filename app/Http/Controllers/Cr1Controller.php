<?php

namespace App\Http\Controllers;

use App\Models\Cr1Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class Cr1Controller extends Controller
{
    public function cr1_list()
    {
        $data['getRecords'] = Cr1Model::getRecords();
        return view('backend/NAAC/CR1/cr1_list',$data);
    }

    public function cr1_add()
    {
        return view('backend/NAAC/CR1/cr1_add');
    }
    public function cr1_insert(Request $request)
    {
        $request->validate([

            'title' => 'required|string',
            'metrics' =>'required|string',
            'pdf' => 'required|mimes:pdf|max:7168', // Max size 7MB

        ]);

         // Handle the PDF file upload

         $file = $request->file('pdf');
         $filename = trim($request->title); // Create a filename
         $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file

         Cr1Model::create([

                'title' => $request->title,
                'metrics' =>$request->metrics,
                'image_path' => $path,
            ]);
            return redirect('cr1_list')->with('success','Metric added successfully');
    }
    public function cr1_edit($id)
    {
        $data['getRecord'] = Cr1Model::getSingle($id);
        return view('backend/NAAC/CR1/cr1_edit',$data);
    }

    public function cr1_update($id, Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'metrics' =>'nullabe|string',
            'pdf' => 'nullable|mimes:pdf|max:7168', // Max size 7MB, make it nullable for updates
        ]);

        // Find the existing record by its ID (assuming you pass the ID in the request)
        $cr1 = Cr1Model::findOrFail($request->id);

        // Update the attributes
        $cr1->title = $request->title;

        // Handle the PDF file upload if a new file is provided
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = trim($request->title); // Create a filename
            $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file
            $cr1->image_path = $path; // Update the image path
        }

        // Save the updated record
        $cr1->save();
        return redirect('cr1_list')->with('success','Metric updated successfully');
    }
    public function cr1_delete($id)
    {
        $save = Cr1Model::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Metric deleted successfully');
    }
}
