<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'author',]; //default for every post query, if i don't want it use without

    public function scopefilter($query, array $filters){

        $query->when($filters['search'] ?? false, fn ($query,$search)=>
        $query->where(fn($query)=>
        $query
            ->where('title','like','%'.$search.'%')
            ->orWhere('body','like','%'. $search .'%')
        )
        );
        $query->when($filters['category'] ?? false, fn ($query,$category)=>
        $query
            ->whereHas('category', fn($query)=> $query ->where('slug',$category))
        );
        $query->when($filters['author'] ?? false, fn ($query,$author)=>
        $query
            ->whereHas('author', fn($query)=> $query ->where('username',$author))
        );
        $query->when($filters['status'] ?? false, fn ($query,$status)=>
        $query
            ->where('status', $status)
        );

    }

    public function incrementViewsCount(){
        $this->views++;
        return $this->save();
    }

    public function comments(){
        return $this->hasMany(Comment::class)->orderByDesc('created_at');
    }

    // protected $guarded = [];
    // protected $fillable = ['title','excerpt','body'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
