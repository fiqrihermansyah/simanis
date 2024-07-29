<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveRamFromCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('processor');
            $table->dropColumn('ram');
            $table->dropColumn('disk');
            $table->dropColumn('os');
            $table->dropColumn('vga');
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('processor');
            $table->string('ram');
            $table->string('disk');
            $table->string('os');
            $table->string('vga');
        });
    }
}
