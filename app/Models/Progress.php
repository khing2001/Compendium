<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{   

    protected $table = 'progress'; // , found in the migrations, the latest in our migrations.
    // visibility, either protected, public, or private
    protected $fillable = ['domain', 'progress', 'learnings'];
}
