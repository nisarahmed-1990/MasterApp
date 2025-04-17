<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LibraryRulesModel;
Use Str;

class LibraryRulesController extends Controller
{
    public function libraryRules_list()
    {
        $data['getRecords'] = LibraryRulesModel::getRecordsImage();
        return view('backend/liby/libraryRules/libraryRules_list',$data);
    }

    public function libraryRules_add()
    {
        return view('backend/liby/libraryRules/libraryRules_add');
    }

    public function libraryRules_insert(Request $request)
    {
        $save = new LibraryRulesModel;
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = LibraryRulesModel::where('slug','=', $slug)->first();

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
            $file->move('upload/libraryRules',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('libraryRules_list')->with('success','Library Rules added successfully');
    }

    public function libraryRules_edit($id)
    {
        $data['getRecord'] = LibraryRulesModel::getSingle($id);
        return view('backend/liby/libraryRules/libraryRules_edit',$data);
    }

    public function libraryRules_update($id, Request $request)
    {
        $save = LibraryRulesModel::getSingle($id);
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->save();
        if(!empty($request->file('image_path')))
        {
            if(!empty($save->getImage()))
            {
                    unlink('upload/libraryRules/'.$save->image_path);
            }
            $ext = $request->file('image_path')->getClientOriginalExtension();
            $file = $request->file('image_path');
            $filename = $save->slug.'.'.$ext;
            $file->move('upload/libraryRules',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('libraryRules_list')->with('success','Library Rules updated successfully');
    }
    public function libraryRules_delete($id)
    {
        $save = LibraryRulesModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Library Rules Message deleted successfully');
    }
}
