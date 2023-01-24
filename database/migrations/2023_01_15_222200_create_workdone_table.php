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
        Schema::create('workdone', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('razorId');
            $table->string('scaleWorkDescription',1024);
            $table->string('bladeWorkDescription',1024);
            $table->string('unfixableIssuesDescription',1024);
            $table->integer('workIsComplete');
            $table->integer('honeLastUsedId');
            $table->string('notes',1024);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workdones');
    }
};
