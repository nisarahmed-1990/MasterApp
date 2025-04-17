<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdministrativeCouncilModel;
Use Str;

class AdministrativeCouncilController extends Controller
{
    public function administrativeCouncil_list()
    {
        $data['getRecords'] = AdministrativeCouncilModel::getRecordsImage();
        return view('backend/administration/administrativeCouncil/administrativeCouncil_list',$data);
    }
    public function administrativeCouncil_add()
    {
        return view('backend/administration/administrativeCouncil/administrativeCouncil_add');
    }

    public function administrativeCouncil_insert(Request $request)
    {
        $save = new AdministrativeCouncilModel;
        $save->title = trim($request->title);
        $save->designation = trim($request->designation);
        $save->save();

        $slug = Str::slug($request->title);
        $checkSlug = AdministrativeCouncilModel::where('slug','=', $slug)->first();

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
            $file->move('upload/administrativeStaff',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('administrativeCouncil_list')->with('success','Administrative Council added successfully');
    }

    public function administrativeCouncil_edit($id)
    {
        $data['getRecord'] = AdministrativeCouncilModel::getSingle($id);
        return view('backend/administration/administrativeCouncil/administrativeCouncil_edit',$data);
    }
    public function administrativeCouncil_update($id, Request $request)
    {
        $save = AdministrativeCouncilModel::getSingle($id);
        $save->title = trim($request->title);
        $save->designation = trim($request->designation);
        $save->save();
        if(!empty($request->file('image_path')))
        {
            if(!empty($save->getImage()))
            {
                    unlink('upload/administrativeStaff/'.$save->image_path);
            }
            $ext = $request->file('image_path')->getClientOriginalExtension();
            $file = $request->file('image_path');
            $filename = $save->slug.'.'.$ext;
            $file->move('upload/administrativeStaff',$filename);

            $save->image_path = $filename;
        }
        $save->save();

        return redirect('administrativeCouncil_list')->with('success','Administrative Council updated successfully');
    }

    public function administrativeCouncil_delete($id)
    {
        $save = AdministrativeCouncilModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','Administrative Council deleted successfully');
    }
}
