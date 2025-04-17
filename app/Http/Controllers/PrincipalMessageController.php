<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrincipalMessageModel;
Use Str;

class PrincipalMessageController extends Controller
{
    public function principalMessage_list()
    {
        $data['getRecords'] = PrincipalMessageModel::getRecordsImage();
        return view('backend/aboutus/principalMessage/principalMessage_list',$data);
    }

    public function principalMessage_add()
    {
        return view('backend/aboutus/principalMessage/principalMessage_add');
    }

    public function principalMessage_insert(Request $request)
    {
        $save = new PrincipalMessageModel;
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = PrincipalMessageModel::where('slug','=', $slug)->first();

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
            $file->move('upload/principalImage',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('principalMessage/principalMessage_list')->with('success','Principal Message added successfully');
    }

    public function principalMessage_edit($id)
    {
        $data['getRecord'] = principalMessageModel::getSingle($id);
        return view('backend/aboutus/principalMessage/principalMessage_edit',$data);
    }
    public function principalMessage_update($id, Request $request)
    {
        $save = principalMessageModel::getSingle($id);
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->save();
        if(!empty($request->file('image_path')))
        {
            if(!empty($save->getImage()))
            {
                    unlink('upload/principalImage/'.$save->image_path);
            }
            $ext = $request->file('image_path')->getClientOriginalExtension();
            $file = $request->file('image_path');
            $filename = $save->slug.'.'.$ext;
            $file->move('upload/principalImage',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('principalMessage/principalMessage_list')->with('success','Principal Message updated successfully');
    }

    public function principalMessage_delete($id)
    {
        $save = principalMessageModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Principal Message deleted successfully');
    }
}
