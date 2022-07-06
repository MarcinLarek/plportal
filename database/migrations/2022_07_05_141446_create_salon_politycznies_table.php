<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonPolityczniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salon_politycznies', function (Blueprint $table) {
          $table->id();
          $table->string('title');
          $table->string('author');
          $table->string('source');
          $table->string('image');
          $table->text('postcontent');
          $table->string('category');
          $table->bigInteger('reads')->unsigned()->default(0)->index();
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
        Schema::dropIfExists('salon_politycznies');
    }
}
