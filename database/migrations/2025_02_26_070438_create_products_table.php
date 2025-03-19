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
            $table->string('name'); //tên bài
            $table->string('artist'); // tên nghệ sĩ 
            $table->string('album')->nullable(); 
            $table->integer('menu_id');
            $table->string('genre')->nullable(); //thể loại
            $table->string('file_path');
            $table->integer('duration')->nullable();//thời gian
            $table->integer('active');
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
