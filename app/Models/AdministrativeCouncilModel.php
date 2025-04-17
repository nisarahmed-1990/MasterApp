<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AdministrativeCouncilModel extends Model
{
    use HasFactory;
    protected $table = 'administrativecouncils';

    static public function getRecordsImage()
    {
        return self::select('administrativecouncils.*')
        ->where('is_delete','=',0)
        ->orderBy('administrativecouncils.id', 'asc')
        ->paginate(10);
    }
    public function getImage()
    {
        if(!empty($this->image_path)&& file_exists('upload/administrativeStaff/'.$this->image_path))
        {
            return url('upload/administrativeStaff/'.$this->image_path);
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
