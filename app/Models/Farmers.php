<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmers extends Model
{
    protected $table = 'farmers';
    protected $primaryKey = 'id';
    protected $fillable = ['name_farmers', 'address_farmers'];

    use HasFactory;
}
