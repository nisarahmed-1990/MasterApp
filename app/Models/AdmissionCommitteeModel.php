<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdmissionCommitteeModel extends Model
{
    use HasFactory;
    protected $table = 'admissioncommittees';
    protected $fillable = ['title','image_path','vision','mission','objectives','committee_convenor',
                            'committee_members'];

    static public function getRecords()
    {
        return self::select('admissioncommittees.*')
        ->where('is_delete','=',0)
        ->orderBy('admissioncommittees.id', 'desc')
        ->paginate(10);
    }

    public function getImage()
    {
        if(!empty($this->pdf)&& file_exists('public/'.$this->pdf))
        {
            return url('public/'.$this->pdf);
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
