<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutCollegeModel;
Use Str;

class AboutCollegeController extends Controller
{
    public function aboutCollege_list()
    {
        $data['getRecords'] = AboutCollegeModel::getRecordsImage();
        return view('backend/aboutus/aboutCollege/aboutCollege_list',$data);
    }

    public function aboutCollege_add()
    {
        return view('backend/aboutus/aboutCollege/aboutCollege_add');
    }

    public function aboutCollege_insert(Request $request)
    {
        $save = new AboutCollegeModel;
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = AboutCollegeModel::where('slug','=', $slug)->first();

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

        return redirect('aboutCollege/aboutCollege_list')->with('success','About College added successfully');
    }

    public function aboutCollege_edit($id)
    {
        $data['getRecord'] = AboutCollegeModel::getSingle($id);
        return view('backend/aboutus/aboutCollege/aboutCollege_edit',$data);
    }

    public function aboutCollege_update($id, Request $request)
    {
        $save = AboutCollegeModel::getSingle($id);
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->save();
        if(!empty($request->file('image_path')))
        {
            if(!empty($save->getImage()))
            {
                    unlink('upload/aboutCollege/'.$save->image_path);
            }
            $ext = $request->file('image_path')->getClientOriginalExtension();
            $file = $request->file('image_path');
            $filename = $save->slug.'.'.$ext;
            $file->move('upload/aboutCollege',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('aboutCollege/aboutCollege_list')->with('success','Secreatory Message updated successfully');
    }
    public function aboutCollege_delete($id)
    {
        $save = AboutCollegeModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','About College Message deleted successfully');
    }
}
