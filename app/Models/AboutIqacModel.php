<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutIqacModel extends Model
{
    use HasFactory;
    protected $table = 'aboutiqacs';
    protected $fillable = ['title','image_path','aboutiqac','iqacestb','iqacco','iqacform',
                            'committee_members'];
    static public function getRecords()
    {
        return self::select('aboutiqacs.*')
        ->where('is_delete','=',0)
        ->orderBy('aboutiqacs.id', 'desc')
        ->paginate(10);
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
