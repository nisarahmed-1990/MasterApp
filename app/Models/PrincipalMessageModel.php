<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrincipalMessageModel extends Model
{
    use HasFactory;
    protected $table = 'principalmessages';

    static public function getRecordsImage()
    {
        return self::select('principalmessages.*')
        ->where('is_delete','=',0)
        ->orderBy('principalmessages.id', 'asc')
        ->paginate(10);
    }

    public function getImage()
    {
        if(!empty($this->image_path)&& file_exists('upload/principalImage/'.$this->image_path))
        {
            return url('upload/principalImage/'.$this->image_path);
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
