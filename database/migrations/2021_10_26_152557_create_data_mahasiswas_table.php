<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('TempatLahir');
            $table->date('TanggalLahir');
            $table->enum('JalurPenerimaan',[
                'SNMPTN',
                'SBMPTN', 
                'Mandiri'
            ]);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_mahasiswas');
    }
}