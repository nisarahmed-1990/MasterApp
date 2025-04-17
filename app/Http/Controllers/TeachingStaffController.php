<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeachingStaffModel;
Use Str;

class TeachingStaffController extends Controller
{
    public function teachingStaff_list()
    {
        $data['getRecords'] = TeachingStaffModel::getRecordsImage();
        return view('backend/administration/teachingStaff/teachingStaff_list',$data);
    }

    public function teachingStaff_add()
    {
        return view('backend/administration/teachingStaff/teachingStaff_add');
    }

    public function teachingStaff_insert(Request $request)
    {
        $save = new TeachingStaffModel;
        $save->title = trim($request->title);
        $save->qualification = trim($request->qualification);
        $save->designation = trim($request->designation);
        $save->department = trim($request->department);
        $save->profile = trim($request->profile);
        $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = TeachingStaffModel::where('slug','=', $slug)->first();

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
            $file->move('upload/teachingStaff',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('teachingStaff_list')->with('success','Teaching Staff added successfully');
    }

    public function teachingStaff_edit($id)
    {
        $data['getRecord'] = TeachingStaffModel::getSingle($id);
        return view('backend/administration/teachingStaff/teachingStaff_edit',$data);
    }

    public function teachingStaff_update($id, Request $request)
    {
        $save = TeachingStaffModel::getSingle($id);
        $save->title = trim($request->title);
        $save->qualification = trim($request->qualification);
        $save->designation = trim($request->designation);
        $save->department = trim($request->department);
        $save->profile = trim($request->profile);
        $save->save();
        if(!empty($request->file('image_path')))
        {
            if(!empty($save->getImage()))
            {
                    unlink('upload/teachingStaff/'.$save->image_path);
            }
            $ext = $request->file('image_path')->getClientOriginalExtension();
            $file = $request->file('image_path');
            $filename = $save->slug.'.'.$ext;
            $file->move('upload/teachingStaff',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('teachingStaff_list')->with('success','Teaching Staff details updated successfully');
    }

    public function teachingStaff_delete($id)
    {
        $save = TeachingStaffModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Teaching Staff deleted successfully');
    }
}
