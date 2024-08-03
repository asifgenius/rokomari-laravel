<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('title');
            $table->unsignedBigInteger('author_id');
            $table->string('description');
            $table->string('category');
            $table->integer('rating');
            $table->integer('year_published');
            $table->string('publisher');
            $table->integer('pages');
            $table->integer('price');
            $table->string('language');
            $table->string('cover_image');
            $table->string('availability_status');
            $table->string('genre');
            $table->string('format');
            $table->string('dimensions');
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
