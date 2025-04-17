<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdmissionCommitteeModel;
use Illuminate\Support\Facades\Storage;
Use Str;

class AdmissionCommitteeController extends Controller
{
    public function admComm_list()
    {
        $data['getRecords'] = AdmissionCommitteeModel::getRecords();
        return view('backend/committees/admissionCommittee/admComm_list',$data);
    }

    public function admComm_add()
    {
        return view('backend/committees/admissionCommittee/admComm_add');
    }

    public function admComm_insert(Request $request)
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

         AdmissionCommitteeModel::create([

                'title' => $request->title,
                'vision' => $request->vision,
                'mission' => $request->mission,
                'objectives' => $request->objectives,
                'committee_convenor' => $request->committee_convenor,
                'committee_members' => $request->committee_members,
                'image_path' => $path,
            ]);
            return redirect('admComm_list')->with('success','Admission Committee added successfully');

    }
    public function admComm_edit($id)
    {
        $data['getRecord'] = AdmissionCommitteeModel::getSingle($id);
        return view('backend/committees/admissionCommittee/admComm_edit',$data);
    }

    public function admComm_update($id, Request $request)
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
        $admissionCommittee = AdmissionCommitteeModel::findOrFail($request->id);

        // Update the attributes
        $admissionCommittee->title = $request->title;
        $admissionCommittee->vision = $request->vision;
        $admissionCommittee->mission = $request->mission;
        $admissionCommittee->objectives = $request->objectives;
        $admissionCommittee->committee_convenor = $request->committee_convenor;
        $admissionCommittee->committee_members = $request->committee_members;

        // Handle the PDF file upload if a new file is provided
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $filename = trim($request->title); // Create a filename
            $path = $file->storeAs('pdfs', $filename, 'public'); // Store the file
            $admissionCommittee->image_path = $path; // Update the image path
        }

        // Save the updated record
        $admissionCommittee->save();
        return redirect('admComm_list')->with('success','Admission Committee updated successfully');
    }
    public function admComm_delete($id)
    {
        $save = AdmissionCommitteeModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Administrative Council deleted successfully');
    }



}
