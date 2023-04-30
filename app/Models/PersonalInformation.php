<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    protected $guarded = [];

    protected $table = 'personal_information';

    public function getFormatBirthdayAttribute(): string
    {
        return Carbon::parse($this->attributes['birthday'])->format('d-m-Y');
    }
}
