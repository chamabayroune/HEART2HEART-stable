<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationsModel extends Model
{
    use HasFactory;
    protected $table = 'donations';
    
    protected $fillable = [
        'donateur',
        'situtation'

    ];
}
