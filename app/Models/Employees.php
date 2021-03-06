<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [ 'firstname', 'lastname', 'company_id', 'email', 'phone'];
    protected $table = 'employees';

    public function company() 
    {
        return $this->belongsTo(Companies::class, 'company_id');
    }

    public function fullName()
    {
        return $this->firstname.' '.$this->lastname;
    }
}
