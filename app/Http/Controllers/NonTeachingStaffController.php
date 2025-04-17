<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NonTeachingStaffModel;
Use Str;

class NonTeachingStaffController extends Controller
{
    public function nonTeachingStaff_list()
    {
        $data['getRecords'] = NonTeachingStaffModel::getRecordsImage();
        return view('backend/administration/nonteachingstaff/nonTeachingStaff_list',$data);
    }

    public function nonTeachingStaff_add()
    {
        return view('backend/administration/nonteachingstaff/nonTeachingStaff_add');
    }

    public function nonTeachingStaff_insert(Request $request)
    {
        $save = new NonTeachingStaffModel;
        $save->title = trim($request->title);
        $save->qualification = trim($request->qualification);
        $save->designation = trim($request->designation);
         $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = NonTeachingStaffModel::where('slug','=', $slug)->first();

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
            $file->move('upload/nonTeachingStaff',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('nonTeachingStaff_list')->with('success','Non Teaching Staff added successfully');
    }

    public function nonTeachingStaff_edit($id)
    {
        $data['getRecord'] = NonTeachingStaffModel::getSingle($id);
        return view('backend/administration/nonteachingstaff/nonTeachingStaff_edit',$data);
    }

    public function nonTeachingStaff_update($id, Request $request)
    {
        $save = NonTeachingStaffModel::getSingle($id);
        $save->title = trim($request->title);
        $save->qualification = trim($request->qualification);
        $save->designation = trim($request->designation);
        $save->save();
        if(!empty($request->file('image_path')))
        {
            if(!empty($save->getImage()))
            {
                    unlink('upload/nonTeachingStaff/'.$save->image_path);
            }
            $ext = $request->file('image_path')->getClientOriginalExtension();
            $file = $request->file('image_path');
            $filename = $save->slug.'.'.$ext;
            $file->move('upload/nonTeachingStaff',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('nonTeachingStaff_list')->with('success','Non Teaching Staff details updated successfully');
    }
    public function nonTeachingStaff_delete($id)
    {
        $save = NonTeachingStaffModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Non Teaching Staff deleted successfully');
    }
}
