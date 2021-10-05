<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount(['items','favorites']);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Item::class, 'favorites', 'user_id', 'items_id')->withTimestamps();
    }
    
    public function favorite($itemsId)
    {
        // すでにお気に入りか確認
        if ($this->is_favorite($itemsId)) {
            // すでにお気に入りであれば何もしない
            return false;
        } else {
            // お気に入りに追加する
            $this->favorites()->attach($itemsId);
            return true;
        }
    }
    public function unfavorite($itemsId)
    {
        // すでにお気に入りか確認
        if ($this->is_favorite($itemsId)) {
            // すでにお気に入りであれば、削除する
            $this->favorites()->detach($itemsId);
            return true;
        } else {
            // お気に入りでなければ何もしない
            return false;
        }
    }
    public function is_favorite($itemsId)
    {
        return $this->favorites()->where('items_id', $itemsId)->exists();
    }

    
}
