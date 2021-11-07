<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->string('nama_ibu')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('tempat_ibu')->nullable();
            $table->string('tempat_ayah')->nullable();
            $table->date('tanggal_ibu')->nullable();
            $table->date('tanggal_ayah')->nullable();
            $table->char('no_ibu')->nullable();
            $table->char('no_ayah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parents');
    }
}
