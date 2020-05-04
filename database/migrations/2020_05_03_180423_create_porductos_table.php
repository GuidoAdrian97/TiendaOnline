<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePorductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('porductos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',50)->unique();
            $table->string('slug',50)->unique();
            $table->unsignedbigInteger('categoria_id');
            $table->bigInteger('cantidad')->unsigned()->default(0);
            $table->decimal('precio_actual',12,2)->default(0);
            $table->decimal('precio_anterior',12,2)->default(0);
            $table->Integer('porcentaje_descuento')->unsigned()->default(0);
            $table->string('descripcion_corta')->nullable();
            $table->string('descripcion_larga')->nullable();
            $table->string('especificacion')->nullable();
            $table->string('datoInteres')->nullable();
            $table->unsignedbigInteger('visitas')->unsigned()->default(0);
            $table->unsignedbigInteger('ventas')->unsigned()->default(0);
            $table->string('estado');
            $table->char('activo',2);
            $table->char('slinderprincipal',2);
            $table->timestamps();
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('porductos');
    }
}
