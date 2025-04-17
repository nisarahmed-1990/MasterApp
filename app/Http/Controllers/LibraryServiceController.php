<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LibraryServiceModel;
Use Str;

class LibraryServiceController extends Controller
{
    public function libraryService_list()
    {
        $data['getRecords'] = LibraryServiceModel::getRecordsImage();
        return view('backend/liby/libraryService/libraryService_list',$data);
    }

    public function libraryService_add()
    {
        return view('backend/liby/libraryService/libraryService_add');
    }

    public function libraryService_insert(Request $request)
    {
        $save = new LibraryServiceModel;
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = LibraryServiceModel::where('slug','=', $slug)->first();

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
            $file->move('upload/libraryService',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('libraryService_list')->with('success','Library Service added successfully');
    }

    public function libraryService_edit($id)
    {
        $data['getRecord'] = LibraryServiceModel::getSingle($id);
        return view('backend/liby/libraryService/libraryService_edit',$data);
    }
    public function libraryService_update($id, Request $request)
    {
        $save = LibraryServiceModel::getSingle($id);
        $save->title = trim($request->title);
        $save->description = trim($request->description);
        $save->save();
        if(!empty($request->file('image_path')))
        {
            if(!empty($save->getImage()))
            {
                    unlink('upload/libraryService/'.$save->image_path);
            }
            $ext = $request->file('image_path')->getClientOriginalExtension();
            $file = $request->file('image_path');
            $filename = $save->slug.'.'.$ext;
            $file->move('upload/libraryService',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('libraryService_list')->with('success','Library Service updated successfully');
    }
    public function libraryService_delete($id)
    {
        $save = LibraryServiceModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Library Service Message deleted successfully');
    }
}
