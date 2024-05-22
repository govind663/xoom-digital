<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'package_type_id',
        'description',
        'amount',
        'image',
        'inserted_by',
        'inserted_at',
        'modified_by',
        'modified_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];

    // ==== Relationship between PackageType
    public function packageType(){
        return $this->belongsTo(PackageType::class, 'package_type_id', 'id');
    }
}
