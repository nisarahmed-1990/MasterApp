<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\TimeTableModel;

class TimeTableModel extends Model
{
    use HasFactory;
    protected $table = 'examinations';
    protected $fillable = ['title','image_path'];

    static public function getRecords()
    {
        return self::select('examinations.*')
        ->where('is_delete','=',0)
        ->orderBy('examinations.id', 'asc')
        ->paginate(10);
    }
    static public function getSingle($id)
    {
        return self::find($id);
    }
}
