<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdmissionProcedureModel;
Use Str;

class AdmissionProcedureController extends Controller
{
    public function admissionProcedure_list()
    {
        $data['getRecords'] = AdmissionProcedureModel::getRecordsImage();
        return view('backend/admission/admissionProcedure/admissionProcedure_list',$data);
    }

    public function admissionProcedure_add()
    {
        return view('backend/admission/admissionProcedure/admissionProcedure_add');
    }

    public function admissionProcedure_insert(Request $request)
    {
        $save = new AdmissionProcedureModel;
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = AdmissionProcedureModel::where('slug','=', $slug)->first();

        if(!empty($checkSlug))
        {
            $bdslug = Str::slug($request->title).'-'.$save->id;
        }
        else
        {
            $bdslug = $slug;
        }
        $save->slug = $bdslug;
        $save->save();

        if(!empty($request->file('image_path')))
        {
            $ext = $request->file('image_path')->getClientOriginalExtension();
            $file = $request->file('image_path');
            $filename = $bdslug.'.'.$ext;
            $file->move('upload/aboutCollege',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('admissionProcedure_list')->with('success','Admission Procedure added successfully');
    }

    public function admissionProcedure_edit($id)
    {
        $data['getRecord'] = AdmissionProcedureModel::getSingle($id);
        return view('backend/admission/admissionProcedure/admissionProcedure_edit',$data);
    }
    public function admissionProcedure_update($id, Request $request)
    {
        $save = AdmissionProcedureModel::getSingle($id);
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->save();
        if(!empty($request->file('image_path')))
        {
            if(!empty($save->getImage()))
            {
                    unlink('upload/admissionProcedure/'.$save->image_path);
            }
            $ext = $request->file('image_path')->getClientOriginalExtension();
            $file = $request->file('image_path');
            $filename = $save->slug.'.'.$ext;
            $file->move('upload/admissionProcedure',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('admissionProcedure_list')->with('success','Admission Procedure updated successfully');
    }
    public function aboutCollege_delete($id)
    {
        $save = AboutCollegeModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Admission Procedure deleted successfully');
    }
}
