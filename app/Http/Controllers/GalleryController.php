<?php

namespace App\Http\Controllers;

use App\Models\GalleryModel;
use Illuminate\Http\Request;
use Str;

class GalleryController extends Controller
{
    public function gallery_list()
    {
        $data['getRecords'] = GalleryModel::getRecordsImage();
        return view('backend/liby/gallery/gallery_list',$data);
    }

    public function gallery_add()
    {
        return view('backend/liby/gallery/gallery_add');
    }
    public function gallery_insert(Request $request)
    {
        $save = new GalleryModel;
        $save->title = trim($request->title);
        $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = GalleryModel::where('slug','=', $slug)->first();

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
            $file->move('upload/gallery',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('gallery_list')->with('success','Gallery Item added successfully');
    }

    public function gallery_edit($id)
    {
        $data['getRecord'] = GalleryModel::getSingle($id);
        return view('backend/liby/gallery/gallery_edit',$data);
    }
    public function gallery_update($id, Request $request)
    {
        $save = GalleryModel::getSingle($id);
        $save->title = trim($request->title);
        $save->save();
        if(!empty($request->file('image_path')))
        {
            if(!empty($save->getImage()))
            {
                    unlink('upload/gallery/'.$save->image_path);
            }
            $ext = $request->file('image_path')->getClientOriginalExtension();
            $file = $request->file('image_path');
            $filename = $save->slug.'.'.$ext;
            $file->move('upload/gallery',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('gallery_list')->with('success','Gallery Item updated successfully');
    }

    public function gallery_delete($id)
    {
        $save = GalleryModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','About College Message deleted successfully');
    }

}
