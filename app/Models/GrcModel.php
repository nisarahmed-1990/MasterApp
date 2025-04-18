<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GrcModel extends Model
{
    use HasFactory;
    protected $table = 'grcs';
    protected $fillable = ['title','image_path','vision','mission','objectives','committee_convenor',
                            'committee_members'];
    static public function getRecords()
    {
        return self::select('grcs.*')
        ->where('is_delete','=',0)
        ->orderBy('grcs.id', 'desc')
        ->paginate(10);
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
