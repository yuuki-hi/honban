<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public function work()
    {
        return $this->belongsTo('App\Work');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    protected $fillable = [
        'sentence',
        'user_id',
        'work_id',
    ];
}
