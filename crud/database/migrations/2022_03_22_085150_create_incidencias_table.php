<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            
            $table->date('fecherror');
            $table->string('error')->unique()->comment('Error');
            $table->enum('tipoerror', ['leve', 'grave'])->nullable();
            $table->string('descerror', 200)->comment('Descripcion del error, como ocurrió');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
}
