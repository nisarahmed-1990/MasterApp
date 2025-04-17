<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicCalendarModel extends Model
{
    use HasFactory;
    protected $table = 'academiccalendars';
    protected $fillable = ['title','image_path'];

    static public function getRecords()
    {
        return self::select('academiccalendars.*')
        ->where('is_delete','=',0)
        ->orderBy('academiccalendars.id', 'asc')
        ->paginate(10);
    }


    static public function getSingle($id)
    {
        return self::find($id);
    }
}
