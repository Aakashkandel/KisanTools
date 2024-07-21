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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->integer('stock');
            $table->foreignId('category_id')->constrained()->onDelete('restrict');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('status')->default(1);
            
            
         
         
           
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
        Schema::dropIfExists('products');
    }
};
