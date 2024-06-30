<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssesmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assesments', function (Blueprint $table) {
            $table->dropForeign(['certificates_id']);
            $table->dropForeign(['participants_id']);

            $table->id();
            $table->integer('value')->nullable();
            $table->timestamps();

            $table->foreign('certificates_id')
                ->references('id')
                ->on('certificates')
                ->onDelete('cascade');
            $table->foreign('participants_id')
                ->references('id')
                ->on('participants')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assesments');
    }
}
