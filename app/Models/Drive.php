<?php

namespace App\Models;

use Database\Factories\DriveFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['company', 'role', 'package_lpa', 'min_cgpa', 'last_date'])]
class Drive extends Model
{
    /** @use HasFactory<DriveFactory> */
    use HasFactory;
}
