<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['phone', 'division', 'district', 'upazila', 'address'];

    public function divisionInfo() {
        return $this->belongsTo(Division::class, 'division', 'id')->select('id', 'name');
    }

    public function districtInfo() {
        return $this->belongsTo(District::class, 'district', 'id')->select('id', 'name');
    }
    public function upazilaInfo() {
        return $this->belongsTo(Upazila::class, 'upazila')->select('id', 'name');
    }
}
