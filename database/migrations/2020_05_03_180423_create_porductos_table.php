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
            $table->string('nombre_Pro',50)->unique();
            $table->string('slug_Pro',50)->unique();
            $table->unsignedbigInteger('categoria_id');
            $table->bigInteger('cantidad_Pro')->unsigned()->default(0);
            $table->decimal('precio_actual_Pro',12,2)->default(0);
            $table->decimal('precio_anterior_Pro',12,2)->default(0);
            $table->Integer('porcentaje_descuento_Pro')->default(0);
            $table->string('descripcion_corta_Pro')->nullable();
            $table->string('descripcion_larga_Pro')->nullable();
            $table->string('especificacion_Pro')->nullable();
            $table->string('datoInteres_Pro')->nullable();
            $table->unsignedbigInteger('visitas_Pro')->unsigned()->default(0);
            $table->unsignedbigInteger('ventas_Pro')->unsigned()->default(0);
            $table->string('estado_Pro');
            $table->char('activo_Pro',2);
            $table->char('slinderprincipal_Pro',2);
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
