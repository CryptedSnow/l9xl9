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
        Schema::create('hunters', function (Blueprint $table) {
            $table->id();
            $table->string('nome_hunter', 50);
            $table->string('email_hunter', 50);
            $table->integer('idade_hunter');
            $table->decimal('altura_hunter', 3,2);
            $table->decimal('peso_hunter', 5,2);
            $table->string('tipo_hunter', 50);
            $table->string('tipo_nen', 50);
            $table->string('tipo_sangue', 3);
            $table->string('serial', 10)->unique();
            $table->timestamps();
            $table->softDeletes();
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
