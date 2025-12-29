<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductivityLogChart extends Model
{
    protected $table = 'productivity_logs_charts';

    protected $fillable = ['user_id', 'tasks_completed_count', 'date'];
}
