<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnSizesInProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->tinyInteger('pro_size_xs')->default(0);
            $table->tinyInteger('pro_size_s')->default(0);
            $table->tinyInteger('pro_size_m')->default(0);
            $table->tinyInteger('pro_size_l')->default(0);
            $table->tinyInteger('pro_size_xl')->default(0);
            $table->tinyInteger('pro_size_xxl')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->tinyInteger('pro_size_xs');
            $table->tinyInteger('pro_size_s');
            $table->tinyInteger('pro_size_m');
            $table->tinyInteger('pro_size_l');
            $table->tinyInteger('pro_size_xl');
            $table->tinyInteger('pro_size_xxl');
        });
    }
}
