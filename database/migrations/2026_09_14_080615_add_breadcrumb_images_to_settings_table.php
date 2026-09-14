<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->string('breadcrumb_about')
                ->nullable()
                ->after('logo');

            $table->string('breadcrumb_contact')
                ->nullable()
                ->after('breadcrumb_about');

            $table->string('breadcrumb_categories')
                ->nullable()
                ->after('breadcrumb_contact');

            $table->string('breadcrumb_collections')
                ->nullable()
                ->after('breadcrumb_categories');

            $table->string('breadcrumb_accessories')
                ->nullable()
                ->after('breadcrumb_collections');

            $table->string('breadcrumb_onsale')
                ->nullable()
                ->after('breadcrumb_accessories');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->dropColumn([
                'breadcrumb_about',
                'breadcrumb_contact',
                'breadcrumb_categories',
                'breadcrumb_collections',
                'breadcrumb_accessories',
                'breadcrumb_onsale',
            ]);

        });
    }
};