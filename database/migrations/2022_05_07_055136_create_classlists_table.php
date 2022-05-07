<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasslistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->constrained('students');
            $table->foreignId('subject_id')->nullable()->constrained('subjects');
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
        Schema::dropIfExists('classlists');
    }
}
