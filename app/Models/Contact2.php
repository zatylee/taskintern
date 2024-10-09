<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact2 extends Model
{
    use HasFactory;
    
    protected $table = 'contacts2';

    public $fillable = ['name', 'email', 'phone', 'subject', 'message'];
}
