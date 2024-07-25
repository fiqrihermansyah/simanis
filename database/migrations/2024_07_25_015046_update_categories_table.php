<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Adding columns if they don't exist and modifying them if they do
            if (!Schema::hasColumn('categories', 'kode_inventaris')) {
                $table->string('kode_inventaris')->after('id');
            } else {
                $table->string('kode_inventaris')->change();
            }

            if (!Schema::hasColumn('categories', 'jenis_barang')) {
                $table->string('jenis_barang')->after('kode_inventaris');
            } else {
                $table->string('jenis_barang')->change();
            }

            if (!Schema::hasColumn('categories', 'serial_number')) {
                $table->string('serial_number')->nullable()->after('jenis_barang');
            } else {
                $table->string('serial_number')->nullable()->change();
            }

            if (!Schema::hasColumn('categories', 'merk_type')) {
                $table->string('merk_type')->nullable()->after('serial_number');
            } else {
                $table->string('merk_type')->nullable()->change();
            }

            if (!Schema::hasColumn('categories', 'tanggal_registrasi')) {
                $table->date('tanggal_registrasi')->nullable()->after('merk_type');
            } else {
                $table->date('tanggal_registrasi')->nullable()->change();
            }

            // PC specific columns
            if (!Schema::hasColumn('categories', 'processor')) {
                $table->string('processor')->nullable()->after('tanggal_registrasi');
            } else {
                $table->string('processor')->nullable()->change();
            }

            if (!Schema::hasColumn('categories', 'ram')) {
                $table->string('ram')->nullable()->after('processor');
            } else {
                $table->string('ram')->nullable()->change();
            }

            if (!Schema::hasColumn('categories', 'disk')) {
                $table->string('disk')->nullable()->after('ram');
            } else {
                $table->string('disk')->nullable()->change();
            }

            if (!Schema::hasColumn('categories', 'os')) {
                $table->string('os')->nullable()->after('disk');
            } else {
                $table->string('os')->nullable()->change();
            }

            if (!Schema::hasColumn('categories', 'vga')) {
                $table->string('vga')->nullable()->after('os');
            } else {
                $table->string('vga')->nullable()->change();
            }

            // Non-PC specific column
            if (!Schema::hasColumn('categories', 'tipe_barang')) {
                $table->string('tipe_barang')->nullable()->after('vga');
            } else {
                $table->string('tipe_barang')->nullable()->change();
            }

            // New columns for additional information
            if (!Schema::hasColumn('categories', 'name')) {
                $table->string('name')->nullable()->after('tipe_barang');
            }

            if (!Schema::hasColumn('categories', 'description')) {
                $table->string('description')->nullable()->after('name');
            }

            if (!Schema::hasColumn('categories', 'user')) {
                $table->string('user')->nullable()->after('description');
            }

            if (!Schema::hasColumn('categories', 'divisi')) {
                $table->string('divisi')->nullable()->after('user');
            }

            if (!Schema::hasColumn('categories', 'lokasi')) {
                $table->string('lokasi')->nullable()->after('divisi');
            }

            // Adding timestamps if not already present
            if (!Schema::hasColumns('categories', ['created_at', 'updated_at'])) {
                $table->timestamps();
            }
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Drop the newly added columns if the migration is rolled back
            $table->dropColumn(['name', 'description', 'user', 'divisi', 'lokasi']);
        });
    }
}
