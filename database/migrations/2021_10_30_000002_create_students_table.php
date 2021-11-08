<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table -> engine = 'InnoDB';
            $table -> id('id');
            $table -> unsignedBigInteger('account_id');
            $table -> foreign('account_id') -> references('id') -> on('accounts');
            $table -> string('agama')->nullable();
            $table -> string('tempat_lahir')->nullable();
            $table -> date('tanggal_lahir')->nullable();
            $table -> string('jenis_kelamin')->nullable();
            $table -> string('jalur_penerimaan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
