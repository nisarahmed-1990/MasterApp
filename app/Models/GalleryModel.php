<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    use HasFactory;
    protected $table = 'gallerys';

    static public function getRecordsImage()
    {
        return self::select('gallerys.*')
        ->where('is_delete','=',0)
        ->orderBy('gallerys.id', 'asc')
        ->paginate(10);
    }
    public function getImage()
    {
        if(!empty($this->image_path)&& file_exists('upload/gallery/'.$this->image_path))
        {
            return url('upload/gallery/'.$this->image_path);
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
