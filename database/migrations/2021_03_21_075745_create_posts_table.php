<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Carbon\Carbon;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->text('description');
            // $table->timestamps();
            // \Carbon\Carbon::parse($date, 'd/m/Y H:i:s')->isoFormat('ddd Do \of MMMM YYYY, h:mm:ss a');
           dd(Carbon::createFromFormat('Y-m-d H:i:s', $table->timestamps())->format('d-m-Y')) ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}