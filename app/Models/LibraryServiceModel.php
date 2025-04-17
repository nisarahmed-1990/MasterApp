<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LibraryServiceModel extends Model
{
    use HasFactory;
    protected $table = 'libraryservices';

    static public function getRecordsImage()
    {
        return self::select('libraryservices.*')
        ->where('is_delete','=',0)
        ->orderBy('libraryservices.id', 'asc')
        ->paginate(10);
    }

    public function getImage()
    {
        if(!empty($this->image_path)&& file_exists('upload/libraryService/'.$this->image_path))
        {
            return url('upload/libraryService/'.$this->image_path);
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
