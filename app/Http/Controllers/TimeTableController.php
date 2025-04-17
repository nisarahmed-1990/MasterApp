<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeTableModel;
use Illuminate\Support\Facades\Storage;

class TimeTableController extends Controller
{
    public function timetable_list()
    {
        $data['getRecords'] = TimeTableModel::getRecords();
        return view('backend/examination/timetable/timetable_list',$data);
    }

    public function timetable_add()
    {
        return view('backend/examination/timetable/timetable_add');
    }

    public function timetable_insert(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:7168',
        ]);

        $file = $request->file('pdf');
        $filename = trim($request->title);
        $path =  Storage::url($filename);
        $file->storeAs('pdfs', $filename, 'public');

        TimeTableModel::create(['title' => $filename, 'image_path' =>$path]);

        return redirect('timetable_list')->with('success','File uploaded successfully');
    }

    public function timetable_delete($id)
    {
        $save = TimeTableModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','file deleted successfully');
    }
}
