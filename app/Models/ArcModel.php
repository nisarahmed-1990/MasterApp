<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArcModel extends Model
{
    use HasFactory;
    protected $table = 'arcs';
    protected $fillable = ['title','image_path','vision','mission','objectives','committee_convenor',
                            'committee_members'];
    static public function getRecords()
    {
        return self::select('arcs.*')
        ->where('is_delete','=',0)
        ->orderBy('arcs.id', 'desc')
        ->paginate(10);
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
