<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PgsyllabusModel;
use Illuminate\Support\Facades\Storage;


class PGSyllabusController extends Controller
{
    public function PGSyllabus_list()
    {
        $data['getRecords'] = PgsyllabusModel::getRecords();
        return view('backend/Syllabus/PGSyllabus/PGSyllabus_list',$data);
    }

    public function PGSyllabus_add()
    {
        return view('backend/Syllabus/PGSyllabus/PGSyllabus_add');
    }

    public function PGSyllabus_insert(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:7168',
        ]);

        $file = $request->file('pdf');
        $filename = trim($request->title);
        $path =  Storage::url($filename);
        $file->storeAs('pdfs', $filename, 'public');

        PgsyllabusModel::create(['title' => $filename, 'image_path' =>$path]);

        return redirect('PGSyllabus_list')->with('success','File uploaded successfully');
    }

    public function PGSyllabus_delete($id)
    {
        $save = PgsyllabusModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','file deleted successfully');
    }
}
