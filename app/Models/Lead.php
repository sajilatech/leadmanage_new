<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

      protected $primaryKey = 'lead_id';
     protected $fillable=[
        'employ_id',
        'lead_name',
        'lead_email',
        'lead_phone',
        'employ_id',
        'status',
        'done_by',
        'created_at',
        'updated_at',
    ];
    public function employeeusers()
{
    return $this->belongsTo(Employeeuser::class, 'lead_id', 'employ_id');
}
}
