<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdmissionProcedureModel extends Model
{
    use HasFactory;
    protected $table = 'admissionproceduers';

    static public function getRecordsImage()
    {
        return self::select('admissionproceduers.*')
        ->where('is_delete','=',0)
        ->orderBy('admissionproceduers.id', 'asc')
        ->paginate(10);
    }
    public function getImage()
    {
        if(!empty($this->image_path)&& file_exists('upload/admissionProcedure/'.$this->image_path))
        {
            return url('upload/admissionProcedure/'.$this->image_path);
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
