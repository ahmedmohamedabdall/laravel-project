<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class idea extends Model
{
    protected $with = ['user:id,name,image', 'comment.user:id,name,image'];
    protected $withcount = ['likes'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['content', 'user_id'];
    use HasFactory;

    public function comment()
    {
        return $this->hasMany(comment::class, 'idea_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }

    public function scopeSearch($query,$search='')
    {
        $query->where('content','like','%'.$search.'%');
    }
}
