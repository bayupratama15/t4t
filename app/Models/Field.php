<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'fields';
    protected $primaryKey = 'id';
    protected $fillable = ['name_fields', 'latitude_fields', 'longitude_fields', 'address_fields'];
    use HasFactory;
}
