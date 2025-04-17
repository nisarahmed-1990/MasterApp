<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UgsyllabusModel;
use Illuminate\Support\Facades\Storage;


class UGSyllabusController extends Controller
{
    public function UGSyllabus_list()
    {
        $data['getRecords'] = UgsyllabusModel::getRecords();
        return view('backend/Syllabus/UGSyllabus/UGSyllabus_list',$data);
    }

    public function UGSyllabus_add()
    {
        return view('backend/Syllabus/UGSyllabus/UGSyllabus_add');
    }

    public function UGSyllabus_insert(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:7168',
        ]);

        $file = $request->file('pdf');
        $filename = trim($request->title);
        $path =  Storage::url($filename);
        $file->storeAs('pdfs', $filename, 'public');

        UgsyllabusModel::create(['title' => $filename, 'image_path' =>$path]);

        return redirect('UGSyllabus_list')->with('success','File uploaded successfully');
    }

    public function UGSyllabus_delete($id)
    {
        $save = UgsyllabusModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','file deleted successfully');
    }
}
