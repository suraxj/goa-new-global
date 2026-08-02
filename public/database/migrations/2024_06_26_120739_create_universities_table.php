<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mode_id');
            $table->string('name');
            $table->string('image');
            $table->string('sample_certificate')->nullable();
            $table->string('brochure')->nullable();
            $table->string('alt');
            $table->string('location');
            $table->longText('content');
            $table->text('short_content');
            $table->string('meta_title');
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
        Schema::dropIfExists('universities');
    }
}
