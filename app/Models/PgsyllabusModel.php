<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PgsyllabusModel extends Model
{
    use HasFactory;
    protected $table = 'pgsyllabus';
    protected $fillable = ['title','image_path'];

    static public function getRecords()
    {
        return self::select('pgsyllabus.*')
        ->where('is_delete','=',0)
        ->orderBy('pgsyllabus.id', 'asc')
        ->paginate(10);
    }

    public function getImage()
    {
        if(!empty($this->filename)&& file_exists('public/pdfs/'.$this->filename))
        {
            return url('public/pdfs/'.$this->filename);
        }
        else
        {
            return "";
        }
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

}
