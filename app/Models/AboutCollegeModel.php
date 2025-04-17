<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutCollegeModel extends Model
{
    use HasFactory;
    protected $table = 'aboutcolleges';

    static public function getRecordsImage()
    {
        return self::select('aboutcolleges.*')
        ->where('is_delete','=',0)
        ->orderBy('aboutcolleges.id', 'asc')
        ->paginate(10);
    }

    public function getImage()
    {
        if(!empty($this->image_path)&& file_exists('upload/aboutCollege/'.$this->image_path))
        {
            return url('upload/aboutCollege/'.$this->image_path);
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
