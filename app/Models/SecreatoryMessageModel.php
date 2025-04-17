<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SecreatoryMessageModel extends Model
{
    use HasFactory;
    protected $table = 'secreatorymessages';

    static public function getRecordsImage()
    {
        return self::select('secreatorymessages.*')
        ->where('is_delete','=',0)
        ->orderBy('secreatorymessages.id', 'asc')
        ->paginate(10);
    }
    public function getImage()
    {
        if(!empty($this->image_path)&& file_exists('upload/secreatoryImage/'.$this->image_path))
        {
            return url('upload/secreatoryImage/'.$this->image_path);
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
