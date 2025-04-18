<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SsrReportsModel extends Model
{
    use HasFactory;
    protected $table = 'ssrreports';
    protected $fillable = ['title','image_path'];

    static public function getRecords()
    {
        return self::select('ssrreports.*')
        ->where('is_delete','=',0)
        ->orderBy('ssrreports.id', 'asc')
        ->paginate(10);
    }

       static public function getSingle($id)
    {
        return self::find($id);
    }
}
