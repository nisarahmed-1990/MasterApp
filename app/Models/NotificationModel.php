<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotificationModel extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = ['title','image_path'];

    static public function getRecords()
    {
        return self::select('notifications.*')
        ->where('is_delete','=',0)
        ->orderBy('notifications.id', 'asc')
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
