<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentStrengthModel extends Model
{
    use HasFactory;
    protected $table = 'studentstrength';
    protected $fillable = ['title','image_path'];

    static public function getRecords()
    {
        return self::select('studentstrength.*')
        ->where('is_delete','=',0)
        ->orderBy('studentstrength.id', 'asc')
        ->paginate(10);
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
