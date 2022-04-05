<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestMethod extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $table = 'test_methodes';

    protected $fillable = [
        'test_id', 'test_name', 'result', 'normal_range', 'method'
    ];


}
