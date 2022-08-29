<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandSpreading extends Model
{
    protected $table = 'land_spreadings';
    protected $primaryKey = 'id';
    protected $fillable = ['field_id', 'farmer_id'];
    use HasFactory;

    public function getDataFarmer()
    {
        return $this->hasOne(Farmers::class, 'id', 'farmer_id');
    }

    public function getDataField()
    {
        return $this->hasOne(Field::class, 'id', 'field_id');
    }
}
