<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Str;

class GeneralController extends Controller
{
    public function carousel_list()
    {
        $data['getRecords'] = Carousel::getRecordsImage();
        return view('carousel.carousel_list', $data);
    }

    public function carousel_add()
    {
        return view('carousel.carousel_add');
    }

    public function carousel_insert(Request $request)
    {
        $save = new Carousel;
        $save->file_name = trim($request->file_name);
        $save->save();

        $slug = Str::slug($request->file_name);
        $checkSlug = Carousel::where('slug','=', $slug)->first();

        if(!empty($checkSlug))
        {
            $bdslug = Str::slug($request->file_name).'-'.$save->id;
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
            $file->move('upload/carousel',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('carousel/carousel_list')->with('success','Carousel Image uploaded successfully');
    }

    public function carousel_edit($id)
    {
        $data['getRecord'] = Carousel::getSingle($id);
        return view('carousel/carousel_edit',$data);
    }

    public function carousel_update($id, Request $request)
    {
        $save = Carousel::getSingle($id);
        $save->file_name = trim($request->file_name);
        $save->save();
        if(!empty($request->file('image_path')))
        {
            if(!empty($save->getImage()))
            {
                    unlink('upload/carousel/'.$save->image_path);
            }
            $ext = $request->file('image_path')->getClientOriginalExtension();
            $file = $request->file('image_path');
            $filename = $save->slug.'.'.$ext;
            $file->move('upload/carousel',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('carousel/carousel_list')->with('success','carousel Image updated successfully');
    }
    public function carousel_delete($id)
    {
        $save = Carousel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','carousel Image deleted successfully');
    }
}
