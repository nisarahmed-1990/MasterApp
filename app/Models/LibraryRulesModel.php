<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LibraryRulesModel extends Model
{
    use HasFactory;
    protected $table = 'libraryrules';

    static public function getRecordsImage()
    {
        return self::select('libraryrules.*')
        ->where('is_delete','=',0)
        ->orderBy('libraryrules.id', 'asc')
        ->paginate(10);
    }
    public function getImage()
    {
        if(!empty($this->image_path)&& file_exists('upload/libraryRules/'.$this->image_path))
        {
            return url('upload/libraryRules/'.$this->image_path);
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
