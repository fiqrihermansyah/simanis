<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategoriesTableForPengguna extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Rename user column to pengguna if it exists
            if (Schema::hasColumn('categories', 'user')) {
                $table->renameColumn('user', 'pengguna');
            } else {
                // If user column doesn't exist, add pengguna column
                $table->string('pengguna')->nullable()->after('tipe_barang');
            }
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Rename pengguna column back to user if it exists
            if (Schema::hasColumn('categories', 'pengguna')) {
                $table->renameColumn('pengguna', 'user');
            }
        });
    }
}
