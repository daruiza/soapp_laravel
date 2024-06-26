<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();            
            $table->string('project', 128);
            $table->unsignedInteger('progress')->default(0);
            $table->boolean('focus')->default(0);
            $table->boolean('active')->default(1);
            $table->string('description', 512)->nullable();
            $table->string('responsible', 128);
            $table->string('email_responsible', 128)->nullable();
            $table->string('phone_responsible', 128)->nullable();
            $table->string('elaborated', 128)->nullable();
            $table->string('email_elaborated', 128)->nullable();
            $table->string('phone_elaborated', 128)->nullable();
            $table->string('passed', 128)->nullable();
            $table->string('email_passed', 128)->nullable();
            $table->string('phone_passed', 128)->nullable();
            $table->date('date')->nullable();

            $table->unsignedBigInteger('commerce_id')->nullable()->default(1);
            $table->foreign('commerce_id')
                ->references('id')
                ->on('commerces')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('reports');
    }
}
