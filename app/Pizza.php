<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pizza extends Model
{

    protected $fillable=[
        'nome',
        'slug',
        'ingredienti',
        'prezzo',
        'vegetariana'
    ];

    public static function genSlug($nome){
        $slug = Str::slug($nome,'-');
        $slug_base = $slug;
        $post_presente = Pizza::where('slug',$slug)->first();
        $c = 1;

        while($post_presente){
            $slug = $slug_base . '-' . $c;
            $c++;
            $post_presente = Pizza::where('slug',$slug)->first();
        }

        return $slug;
    }
}
