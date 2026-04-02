<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use HasFactory, SoftDeletes;
    //
    protected $fillable = ['title', 'body', 'user_id'];

    function user(){
    return $this->belongsTo(User::class);
}
public function comments(){
    return $this->morphMany(Comment::class,'commentable');
}

}