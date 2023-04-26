<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'client',
        'content',
        'url'
    ];

    //public function category(){
        //return $this->belongsTo(Category::class, 'category_id', 'id') questi 2 parametri servono se non usiamo le convenzioni e li chiamiamo in modi diversi
    //}
}
