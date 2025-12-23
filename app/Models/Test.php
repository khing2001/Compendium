<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{   

    protected $table = 'test'; // , found in the migrations, the latest in our migrations.
    // visibility, either protected, public, or private
    protected $fillable = ['header', 'subheader', 'description', 'headCategories', 'subCategories'];
}
