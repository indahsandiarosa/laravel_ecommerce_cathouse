<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('tb_user', function (Blueprint $table) {
        $table->string('role')->default('user');  // Menambahkan kolom 'role'
    });
}

public function down()
{
    Schema::table('tb_user', function (Blueprint $table) {
        $table->dropColumn('role');  // Menghapus kolom 'role' jika migrasi dibatalkan
    });
}

};
