<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model

{
    protected $fillable =['title', 'description', 'date', 'user_id'];

    public function user(){

        return $this->belongsTo('App\User');
    }
}