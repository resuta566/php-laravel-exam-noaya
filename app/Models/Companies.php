<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'email', 'logo', 'website' ];
    protected $table = 'companies';

    public function employees() 
    {
        return $this->hasMany(Employees::class);
    }

}
