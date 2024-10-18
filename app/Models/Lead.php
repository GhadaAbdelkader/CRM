<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'lead_status', 'lead_owner', 'salutation', 'first_name', 'last_name', 'title',
        'email', 'phone', 'company', 'rate', 'industry', 'no_of_employees', 'lead_source',
        'address', 'street', 'city', 'state_province', 'zip_postal_code', 'country','gender', 'birthday',
    ];

    public function getAgeAttribute()
    {
        // Check if birthday is null
        if ($this->birthday) {
            return Carbon::parse($this->birthday)->age;
        }
        return null; // Return null or a default value if no birthday is set
    }
}
