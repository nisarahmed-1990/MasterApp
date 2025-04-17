<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeachingStaffModel extends Model
{
    use HasFactory;
    protected $table = 'techingstaffs';

    static public function getRecordsImage()
    {
        return self::select('techingstaffs.*')
        ->where('is_delete','=',0)
        ->orderBy('techingstaffs.id', 'asc')
        ->paginate(10);
    }

    public function getImage()
    {
        if(!empty($this->image_path)&& file_exists('upload/teachingStaff/'.$this->image_path))
        {
            return url('upload/teachingStaff/'.$this->image_path);
        }
        else
        {
            return "";
        }
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
