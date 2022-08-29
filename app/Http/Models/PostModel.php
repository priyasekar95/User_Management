<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
   protected $table = "posts";
   
    protected $fillable = [
        'first_name', 'last_name','name'];
}
