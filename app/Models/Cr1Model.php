<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cr1Model extends Model
{
    use HasFactory;
    protected $table = 'cr1s';
    protected $fillable = ['title','image_path','metrics','slug'];

    static public function getRecords()
    {
        return self::select('cr1s.*')
        ->where('is_delete','=',0)
        ->orderBy('cr1s.id', 'asc')
        ->paginate(10);
    }

       static public function getSingle($id)
    {
        return self::find($id);
    }
}
