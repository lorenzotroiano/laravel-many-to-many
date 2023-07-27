<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'publish_date',
        'description',
        'accessibility',
        'main_picture',

        'type_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }


    public function technologies()
    {

        return $this->belongsToMany(Technology::class);
    }
}
