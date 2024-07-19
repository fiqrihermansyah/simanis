<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->string('inventory_code')->nullable();
            $table->string('item_type')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('brand')->nullable();
            $table->date('registration_date')->nullable();
            $table->string('processor')->nullable();
            $table->string('ram')->nullable();
            $table->string('hard_disk')->nullable();
            $table->string('os')->nullable();
            $table->string('vga')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->dropColumn([
                'inventory_code', 'item_type', 'serial_number', 'brand', 
                'registration_date', 'processor', 'ram', 'hard_disk', 'os', 'vga'
            ]);
        });
    }
}
