<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NonTeachingStaffModel extends Model
{
    use HasFactory;
    protected $table = 'nonteachingstaffs';
    static public function getRecordsImage()
    {
        return self::select('nonteachingstaffs.*')
        ->where('is_delete','=',0)
        ->orderBy('nonteachingstaffs.id', 'asc')
        ->paginate(10);
    }

    public function getImage()
    {
        if(!empty($this->image_path)&& file_exists('upload/nonTeachingStaff/'.$this->image_path))
        {
            return url('upload/nonTeachingStaff/'.$this->image_path);
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
