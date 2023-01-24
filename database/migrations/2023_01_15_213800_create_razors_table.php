<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('razors', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('manufacturerId');
            $table->integer('brandId');
            $table->string('tangTextFront',255);
            $table->string('tangTextBack',100);
            $table->string('bladeTextFront',255);
            $table->string('earliestYear',10);
            $table->string('latestYear',10);
            $table->integer('scaleMaterialId');
            $table->string('scaleText',255);
            $table->string('scaleDescription',255);
            $table->string('bladeDescription',255);
            $table->string('conditionWhenBought',255);
            $table->string('knownCountryMadeIn',100);
            $table->string('guessedCountryMadeIn',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('razors');
    }
};
