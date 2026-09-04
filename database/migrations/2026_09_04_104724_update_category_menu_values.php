<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First change existing data
        DB::table('categories')
            ->where('menu', 'High Jewelry')
            ->update(['menu' => 'Accessories']);

        DB::table('categories')
            ->where('menu', 'AD Signature')
            ->update(['menu' => 'OnSale']);

        // Then change the enum values
        Schema::table('categories', function (Blueprint $table) {
            $table->enum('menu', [
                'Collections',
                'Accessories',
                'OnSale'
            ])->default('Collections')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('categories')
            ->where('menu', 'Accessories')
            ->update(['menu' => 'High Jewelry']);

        DB::table('categories')
            ->where('menu', 'OnSale')
            ->update(['menu' => 'AD Signature']);

        Schema::table('categories', function (Blueprint $table) {
            $table->enum('menu', [
                'Collections',
                'High Jewelry',
                'AD Signature'
            ])->default('Collections')->change();
        });
    }
};