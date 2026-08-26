<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $dates = ['date'];

    protected $casts = [
        'birth_day' => 'date'
    ];

    protected $guarded = [];

    protected $fillable = [
        'name',
        'breed',
        'description',
        'birth_day',
        'image',
        'user_id',
    ];

    public function user(){
        return $this -> belongsTo('App\Models\User');
    }
}
