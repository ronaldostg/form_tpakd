<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'indonesia_villages';
}
