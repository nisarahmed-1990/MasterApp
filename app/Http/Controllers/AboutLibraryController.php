<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutLibraryModel;
Use Str;

class AboutLibraryController extends Controller
{
    public function aboutLibrary_list()
    {
        $data['getRecords'] = AboutLibraryModel::getRecordsImage();
        return view('backend/liby/aboutLibrary/aboutLibrary_list',$data);
    }

    public function aboutLibrary_add()
    {
        return view('backend/liby/aboutLibrary/aboutLibrary_add');
    }

    public function aboutLibrary_insert(Request $request)
    {
        $save = new AboutLibraryModel;
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = AboutLibraryModel::where('slug','=', $slug)->first();

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
            $file->move('upload/aboutLibrary',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('aboutLibrary_list')->with('success','About Library added successfully');
    }

    public function aboutLibrary_edit($id)
    {
        $data['getRecord'] = AboutLibraryModel::getSingle($id);
        return view('backend/liby/aboutLibrary/aboutLibrary_edit',$data);
    }

    public function aboutLibrary_update($id, Request $request)
    {
        $save = AboutLibraryModel::getSingle($id);
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->save();
        if(!empty($request->file('image_path')))
        {
            if(!empty($save->getImage()))
            {
                    unlink('upload/aboutLibrary/'.$save->image_path);
            }
            $ext = $request->file('image_path')->getClientOriginalExtension();
            $file = $request->file('image_path');
            $filename = $save->slug.'.'.$ext;
            $file->move('upload/aboutLibrary',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('aboutLibrary_list')->with('success','About Library updated successfully');
    }

    public function aboutLibrary_delete($id)
    {
        $save = AboutLibraryModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','About Library Message deleted successfully');
    }
}
