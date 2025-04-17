<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutLibraryModel extends Model
{
    use HasFactory;
    protected $table = 'aboutlibrarys';

    static public function getRecordsImage()
    {
        return self::select('aboutlibrarys.*')
        ->where('is_delete','=',0)
        ->orderBy('aboutlibrarys.id', 'asc')
        ->paginate(10);
    }
    public function getImage()
    {
        if(!empty($this->image_path)&& file_exists('upload/aboutLibrary/'.$this->image_path))
        {
            return url('upload/aboutLibrary/'.$this->image_path);
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
