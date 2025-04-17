<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UgsyllabusModel;

class UgsyllabusModel extends Model
{
    use HasFactory;
    protected $table = 'ugsyllabus';
    protected $fillable = ['title','image_path'];

    static public function getRecords()
    {
        return self::select('ugsyllabus.*')
        ->where('is_delete','=',0)
        ->orderBy('ugsyllabus.id', 'asc')
        ->paginate(10);
    }

       static public function getSingle($id)
    {
        return self::find($id);
    }

}
