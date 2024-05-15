<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'beverage';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'beverage_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'beverage_name',
    'image_link',
    'price',
    ];
}
