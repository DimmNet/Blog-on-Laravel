<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function addComment($body)
    {
        $this->comments()->create([
            'body' => $body,
            'user_id' => auth()->id()
        ]);
    }
    
    public function scopeFilter($query, $filters)
    {
        if ($filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }
        
        if ($filters['year']) {
            $query->whereYear('created_at', $filters['year']);
        }
    }
    
    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
