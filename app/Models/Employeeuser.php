<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeeuser extends Model
{
    use HasFactory;
     protected $primaryKey = 'employ_id';
    protected $fillable=[
        'employ_name',
        'employ_email',
        'employ_phone',
         'employ_username',
          'employ_password',
        'status',
        'done_by',
        'created_at',
        'updated_at',
    ];
}
