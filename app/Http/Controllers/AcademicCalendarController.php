<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicCalendarModel;
use Illuminate\Support\Facades\Storage;


class AcademicCalendarController extends Controller
{
    public function AcademicCalendar_list()
    {
        $data['getRecords'] = AcademicCalendarModel::getRecords();
        return view('backend/academic/academicCalendar/AcademicCalendar_list',$data);
    }

    public function AcademicCalendar_add()
    {
        return view('backend/academic/academicCalendar/AcademicCalendar_add');
    }

    public function AcademicCalendar_insert(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:6144',
        ]);

        $file = $request->file('pdf');
        $filename = trim($request->title);
        $path =  Storage::url($filename);
        $file->storeAs('pdfs', $filename, 'public');

        AcademicCalendarModel::create(['title' => $filename, 'image_path' =>$path]);

        return redirect('AcademicCalendar_list')->with('success','File uploaded successfully');
    }

    public function AcademicCalendar_delete($id)
    {
        $save = AcademicCalendarModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','file deleted successfully');
    }
}
