<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hunter', function (Blueprint $table) {
            $table->id();
            $table->string('nome_hunter', 50);
            $table->integer('idade_hunter');
            $table->decimal('altura_hunter', 3,2);
            $table->decimal('peso_hunter', 5,2);
            $table->string('tipo_hunter', 30);
            $table->string('tipo_nen', 30);
            $table->string('tipo_sangue', 3);
            $table->timestamp('data_cadastro')->useCurrent();
            $table->timestamp('data_atualizacao')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hunter');
    }
};
