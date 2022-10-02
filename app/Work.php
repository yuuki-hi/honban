<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function chats()   
    {
        return $this->hasMany('App\Chat');  
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
        'title',
        'sentence',
        'image',
        'category_id',
    ];
}

