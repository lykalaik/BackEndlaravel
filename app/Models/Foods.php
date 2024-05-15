<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'food';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'food_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'food_category',
    'food_name',
    'image_link',
    'price',
    ];
}