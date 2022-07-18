<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public function ingredients(){
        return $this->belongsToMany('App\Ingredient');
    }

    protected $fillable = [
        'name',
        'slug',
        'price',
        'popularity',
        'is_vegetarian'

    ];

    public static function slugGenerator($name){

        $slug = Str::slug($name, '-');
        $old_pizza = Pizza::where('slug', $slug)->first();
        $new_slug = $slug;
        $counter =1;

        while($old_pizza){
            $slug = $new_slug.'-'.$counter;
            $counter ++;
            $old_pizza = Pizza::where('slug', $slug)->first();
        }
        return $slug;
    }
}
