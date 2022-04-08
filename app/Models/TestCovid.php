<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCovid extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $table = 'test_covids';

    protected $fillable = [
        'id', 'nik', 'name', 'gender', 'date_of_birth', 'sampling_date', 'time_of_test', 'checkpoint', 'address', 'status', 'signature_id'
    ];

    public function TestMethod()
    {
        return $this->hasMany(TestMethod::class, 'test_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'signature_id');
    }

}
