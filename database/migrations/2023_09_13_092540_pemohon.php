<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pemohon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemohon', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('tempat_lahir');
            $table->date('dob');
            $table->text('area');
            $table->text('noSC');
            $table->text('noKTP');
            $table->text('agency');
            $table->text('namaAtasan');
            $table->text('tanggalPengajuan');
            $table->text('noTelpAtasan');
            $table->text('position');
            $table->text('sales_active');
            $table->text('sales_order');
            $table->text('nominalPermohonan');
            $table->text('pencairanTahap1');
            $table->text('pencairanTahap2');
            $table->text('totalDiterima');
            $table->longText('signature');
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
        Schema::dropIfExists('pemohon');
    }
}
