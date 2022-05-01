<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = null;

    use HasFactory;
}
