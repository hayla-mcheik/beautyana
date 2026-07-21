<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about_data', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            
            // Images (Strings to store the file paths)
            $table->string('imgone')->nullable();
            $table->string('imgtwo')->nullable();
            $table->string('imgthree')->nullable();
            
            // Years of experience / timeline
            $table->integer('years')->default(0);
            
            // Icons
            $table->string('iconone')->nullable();
            $table->string('icontwo')->nullable();
            $table->string('iconthree')->nullable();
            
            // Sub-titles
            $table->string('titleone')->nullable();
            $table->string('titletwo')->nullable();
            $table->string('titlethree')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_data');
    }
};