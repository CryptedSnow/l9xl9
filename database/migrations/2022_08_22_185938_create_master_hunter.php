<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Schema::create('master', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('id_hunter')->constrained('hunter');
        //     $table->string('nome_master', 50);
        //     $table->string('tipo_nen', 30);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('master');
    }
};
