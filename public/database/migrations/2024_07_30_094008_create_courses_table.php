<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('full_name')->nullable();
            $table->string('image');
            $table->string('alt');
            $table->string('duration');
            $table->string('eligibilty');
            $table->string('fees');
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
        Schema::dropIfExists('courses');
    }
}
