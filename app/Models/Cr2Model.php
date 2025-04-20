<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cr2Model extends Model
{
    use HasFactory;
    protected $table = 'cr2s';
    protected $fillable = ['title','image_path','metrics','slug'];

    static public function getRecords()
    {
        return self::select('cr2s.*')
        ->where('is_delete','=',0)
        ->orderBy('cr2s.id', 'asc')
        ->paginate(10);
    }

       static public function getSingle($id)
    {
        return self::find($id);
    }
}
