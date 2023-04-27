<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RservationModel extends Model
{
    use HasFactory;
    protected $table = 'reservation';
    
    protected $fillable = [
        'patient',
        'date_reservation',
        'type_reservation',
    ];
}
