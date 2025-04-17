<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotificationModel;
use Illuminate\Support\Facades\Storage;

class NotificationController extends Controller
{
    public function notification_list()
    {
        $data['getRecords'] = NotificationModel::getRecords();
        return view('backend/admission/Notification/notification_list',$data);
    }

    public function notification_add()
    {
        return view('backend/admission/Notification/notification_add');
    }

    public function notification_insert(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:7168',
        ]);

        $file = $request->file('pdf');
        $filename = trim($request->title);
        $path =  Storage::url($filename);
        $file->storeAs('pdfs', $filename, 'public');

        NotificationModel::create(['title' => $filename, 'image_path' =>$path]);

        return redirect('notification_list')->with('success','File uploaded successfully');
    }

    public function notification_delete($id)
    {
        $save = NotificationModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success','file deleted successfully');
    }
}
