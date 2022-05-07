<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subj_name');
            $table->string('subj_code');
            $table->text('subj_description');
            $table->string('subj_units');
            $table->string('subj_type');
            $table->string('subj_section');
            $table->foreignId('subj_instructor')->nullable()->constrained('users');
            $table->foreignId('sem_id')->nullable()->constrained('semesters');
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
        Schema::dropIfExists('subjects');
    }
}
