<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // Normalized table
    public function up(): void /// The up function creates the table while the down function is called when we do migration:rollback
    {
        Schema::create('categories', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('color_hex');
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete(); 

            $table->string('title');
            $table->string('priority');
            $table->string('status');
            $table->date('due_date');
            $table->timestamps();
        });

        Schema::create('productivity_logs_charts', function(Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); //constrained connects to users table
            // The constrained function automatically looks at the name in name_id and the plural form will be used as the reference for it to connect to the table.
            // This is why, tables must be named in plural form
            $table->integer('tasks_completed_count');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::dropIfExists(('productivity_log_charts'));
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('categories');
    }
};
