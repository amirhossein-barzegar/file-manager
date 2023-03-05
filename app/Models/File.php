<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    # Attributes can be fill
    protected $fillable = [
        'name',
        'type',
        'link',
        'user_id',
        'password',
        'icon'
    ];

    # Make custom attributes
    protected $appends = [
        'icon',
        'full_name'
    ];

    # A file belongs to an specific user
    public function user() {
        $this->belongsTo(User::class,'user_id');
    }

    # Get value for full_name Attribute
    public function getFullNameAttribute() {
        return $this->name.'.'.$this->type;
    }

    # Get value for icon Attribute
    public function getIconAttribute() {
        switch($this->type) {
            case 'jpg':
            case 'jpeg':
                return 'fa fa-file-image-o';
                break;
            case 'mp4':
                return 'fa fa-file-movie-o';
                break;
            case 'png':
                return 'fa fa-image';
                break;
            case 'bmp':
                return 'fa fa-file-movie-o';
                break;
            case 'webp':
                return 'fa fa-file-movie-o';
                break;
            case 'svg':
                return 'fa fa-picture-o';
                break;
            case 'pdf':
                return 'fa fa-file-pdf-o';
                break;
            case 'doc':
            case 'docx':
                return 'fa fa-file-word-o';
                break;
            case 'xls':
            case 'xlsx':
                return 'fa fa-file-excel-o';
                break;
            case 'ppt':
            case 'pptx':
                return 'fa fa-file-powerpoint-o';
                break;
            case 'mp3':
                return 'fa fa-file-audio-o';
                break;
            case 'avi':
                return 'fa fa-video-camera';
                break;
            case 'mkv':
                return 'fa fa-film';
                break;
            default: 
                return 'fa fa-file-code-o';
        }
    }

    # Get value for size Attribute
    public function getSizeAttribute($value) {
        $kb = round($value / 1024, 2);
        $mb = round($kb / 1024, 2);
        $gb = round($mb / 1024, 2);
        switch($value) {
            case $kb < 1000:
                return $kb.' KB';
            break;
            case $mb >= 1 && $mb < 1000:
                return $mb.' MB';
            break;
            case $gb >= 1:
                return $gb.' GB';
            break;
        }
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'link';
    }
}
