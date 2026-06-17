<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'description', 'posted_by'];
    protected $fillable= [
        'title',
        'description',
        'user_id'
    ];// it means only these fields are fillable and id field is not fillable because it is auto incremented in database and it will be generated automatically when we insert new record in database

    public function user(){
        return $this->belongsTo(User::class);
    }
}

