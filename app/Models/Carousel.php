<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Carousel extends Model
{
    use HasFactory;
    protected $table = 'carousels';

    static public function getRecordsImage()
    {
        return self::select('carousels.*')
        ->where('is_delete','=',0)
        ->orderBy('carousels.id', 'asc')
        ->paginate(10);
    }

    public function getImage()
    {
        if(!empty($this->image_path)&& file_exists('upload/carousel/'.$this->image_path))
        {
            return url('upload/carousel/'.$this->image_path);
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
