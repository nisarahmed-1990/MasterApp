<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CollegeDocsModel extends Model
{
    use HasFactory;
    protected $table = 'collegedocs';
    protected $fillable = ['title','image_path'];

    static public function getRecords()
    {
        return self::select('collegedocs.*')
        ->where('is_delete','=',0)
        ->orderBy('collegedocs.id', 'asc')
        ->paginate(10);
    }

       static public function getSingle($id)
    {
        return self::find($id);
    }
}
