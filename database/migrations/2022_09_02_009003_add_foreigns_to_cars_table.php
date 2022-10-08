<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table
                ->foreign('car_brand_id')
                ->references('id')
                ->on('car_brands')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('car_driver_id')
                ->references('id')
                ->on('car_drivers')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropForeign(['car_brand_id']);
            $table->dropForeign(['car_driver_id']);
        });
    }
};
