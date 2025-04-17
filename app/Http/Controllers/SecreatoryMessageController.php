<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SecreatoryMessageModel;
Use Str;

class SecreatoryMessageController extends Controller
{
    public function secreatoryMessage_list()
    {
        $data['getRecords'] = SecreatoryMessageModel::getRecordsImage();
        return view('backend/aboutus/secreatoryMessage/secreatoryMessage_list',$data);
    }

    public function secreatoryMessage_add()
    {
        return view('backend/aboutus/secreatoryMessage/secreatoryMessage_add');
    }

    public function secreatoryMessage_insert(Request $request)
    {
        $save = new SecreatoryMessageModel;
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = SecreatoryMessageModel::where('slug','=', $slug)->first();

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
            $file->move('upload/secreatoryImage',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('secreatoryMessage/secreatoryMessage_list')->with('success','Secreatory Message added successfully');
    }
    public function secreatoryMessage_edit($id)
    {
        $data['getRecord'] = SecreatoryMessageModel::getSingle($id);
        return view('backend/aboutus/secreatoryMessage/secreatoryMessage_edit',$data);
    }

    public function secreatoryMessage_update($id, Request $request)
    {
        $save = SecreatoryMessageModel::getSingle($id);
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->save();
        if(!empty($request->file('image_path')))
        {
            if(!empty($save->getImage()))
            {
                    unlink('upload/secreatoryImage/'.$save->image_path);
            }
            $ext = $request->file('image_path')->getClientOriginalExtension();
            $file = $request->file('image_path');
            $filename = $save->slug.'.'.$ext;
            $file->move('upload/secreatoryImage',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('secreatoryMessage/secreatoryMessage_list')->with('success','Secreatory Message updated successfully');
    }

    public function secreatoryMessage_delete($id)
    {
        $save = SecreatoryMessageModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Secreatory Message deleted successfully');
    }
}
