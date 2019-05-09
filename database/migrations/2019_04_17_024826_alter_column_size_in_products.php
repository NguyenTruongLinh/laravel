<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnSizeInProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->tinyInteger('pro_qty_xs')->default(0);
            $table->tinyInteger('pro_qty_s')->default(0);
            $table->tinyInteger('pro_qty_m')->default(0);
            $table->tinyInteger('pro_qty_l')->default(0);
            $table->tinyInteger('pro_qty_xl')->default(0);
            $table->tinyInteger('pro_qty_xxl')->default(0);
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
            $table->tinyInteger('pro_qty_xs');
            $table->tinyInteger('pro_qty_s');
            $table->tinyInteger('pro_qty_m');
            $table->tinyInteger('pro_qty_l');
            $table->tinyInteger('pro_qty_xl');
            $table->tinyInteger('pro_qty_xxl');
        });
    }
}
