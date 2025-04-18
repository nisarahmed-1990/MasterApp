<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MinorityCellModel extends Model
{
    use HasFactory;
    protected $table = 'minoritycells';
    protected $fillable = ['title','image_path','vision','mission','objectives','committee_convenor',
                            'committee_members'];
    static public function getRecords()
    {
        return self::select('minoritycells.*')
        ->where('is_delete','=',0)
        ->orderBy('minoritycells.id', 'asc')
        ->paginate(10);
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
