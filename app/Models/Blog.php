<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comments;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function comments(){
        return $this->hasMany(Comments::class);
    }

}
