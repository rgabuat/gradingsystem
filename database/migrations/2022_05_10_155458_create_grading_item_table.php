<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradingItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grading_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subj_id')->nullable()->constrained('subjects');
            $table->string('item_name');
            $table->string('max_grade');
            $table->string('grade_period');
            $table->foreignId('cat_id')->nullable()->constrained('category');
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
        Schema::dropIfExists('grading_item');
    }
}
