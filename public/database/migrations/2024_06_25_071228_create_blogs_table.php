<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->longText('content');
            $table->unsignedBigInteger('category_id');
            $table->text('short_content');
            $table->unsignedBigInteger('view');
            $table->string('meta_titel');
            $table->text('meta_description');
            $table->string('slug');
            $table->longText('ld_schema')->collation('utf8mb4_general_ci')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
