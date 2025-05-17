<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_reviews', function (Blueprint $table) {
            $table->tinyInteger('rating')->after('review')->default(5); 
        });
    }

    public function down()
    {
        Schema::table('user_reviews', function (Blueprint $table) {
            $table->dropColumn('rating');
        });
    }
};
