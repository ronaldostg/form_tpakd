<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTpakdModel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'tbl_loan_register';



}
