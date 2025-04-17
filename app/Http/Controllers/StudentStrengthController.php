<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentStrengthModel;
use Illuminate\Support\Facades\Storage;

class StudentStrengthController extends Controller
{
    public function studentStrength_list()
    {
        $data['getRecords'] = StudentStrengthModel::getRecords();
        return view('backend/admission/studentStrength/studentStrength_list',$data);
    }

    public function studentStrength_add()
    {
        return view('backend/admission/studentStrength/studentStrength_add');
    }

    public function studentStrength_insert(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:6144',
        ]);

        $file = $request->file('pdf');
        $filename = trim($request->title);
        $path =  Storage::url($filename);
        $file->storeAs('pdfs', $filename, 'public');

        StudentStrengthModel::create(['title' => $filename, 'image_path' =>$path]);

        return redirect('studentStrength_list')->with('success','File uploaded successfully');
    }

    public function studentStrength_delete($id)
    {
        $save = StudentStrengthModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','file deleted successfully');
    }
}
