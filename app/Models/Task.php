<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'task_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'customer_area',
        'customer_city',
        'customer_pincode',
        'package_id',
        'lead_source_id',
        'lead_dt',
        'meating_dt',
        'meating_time',
        'payment_receive_status',
        'payment_type',
        'payment_date',
        'advanced_payment',
        'balance_payment',
        'task_status',
        'user_id',
        'lead_by',
        'inserted_by',
        'inserted_at',
        'modified_by',
        'modified_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];

    // ==== Relationship between Package
    public function package(){
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

    // ==== Relationship between User
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id',);
    }

    // ==== Relationship between Lead Source
    public function leadSource(){
        return $this->belongsTo(User::class, 'lead_by', 'id');
    }
}
