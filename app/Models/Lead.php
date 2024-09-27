<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'lead_status', 'lead_owner', 'salutation', 'first_name', 'last_name', 'title',
        'email', 'phone', 'company', 'rate', 'industry', 'no_of_employees', 'lead_source',
        'address', 'street', 'city', 'state_province', 'zip_postal_code', 'country'
    ];
}
