<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            // Creamos un id foraneo
            $table->foreignId('user_id')->nullable()
                // referenciamos el id foraneo con el id de la tabla users
                ->constrained('users')
                // la actualizacion será en cascada
                ->cascadeOnUpdate()
                // la eliminacion convertirá en null
                ->nullOnDelete();
            // Añadimos informacion que recogeremos con el formulario
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->integer('edad')->nullable();
            $table->date('fecha_de_nacimiento')->nullable();
            //Valor unico 
            $table->char('telefono', 9)->unique();
            $table->string('email', 40)->unique();
            // Valores seleccionables
            $table->enum('estudios', ['daw', 'dam', 'asix'])->nullable();
            $table->string('carnet')->default('');
            // Texto
            $table->text('descripcion')->nullable();
            // Valor booleano
            $table->boolean('favicon')->default(0);
            // Valor de una imagen
            $table->string('imagen')->nullable();
            // Recoge el tiempo
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
        Schema::dropIfExists('usuarios');
    }
}
