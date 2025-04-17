<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BooksCollectionModel extends Model
{
    use HasFactory;
    protected $table = 'bookscollections';
    static public function getRecordsImage()
    {
        return self::select('bookscollections.*')
        ->where('is_delete','=',0)
        ->orderBy('bookscollections.id', 'asc')
        ->paginate(10);
    }

    public function getImage()
    {
        if(!empty($this->image_path)&& file_exists('upload/admissionProcedure/'.$this->image_path))
        {
            return url('upload/admissionProcedure/'.$this->image_path);
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
