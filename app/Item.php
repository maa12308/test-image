<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['bland', 'type', 'area', 'alcohol_content', 'distillery', 'memo', 'image'];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
