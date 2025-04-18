<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WecModel extends Model
{
    use HasFactory;
    protected $table = 'wecs';
    protected $fillable = ['title','image_path','vision','mission','objectives','committee_convenor',
                            'committee_members'];
    static public function getRecords()
    {
        return self::select('wecs.*')
        ->where('is_delete','=',0)
        ->orderBy('wecs.id', 'desc')
        ->paginate(10);
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
