<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdeasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideasis', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('title_en')->nullable(false);
            $table->string('subtitle')->nullable();
            $table->string('subtitle_en')->nullable();
            $table->text('content')->nullable(false);
            $table->text('content_en')->nullable(false);
            $table->text('image')->nullable();
            $table->enum('is_approved', ['0', '1'])->nullable();
            $table->enum('is_share', ['0', '1'])->nullable();
            $table->timestamp('inactive_at')->nullable();
            $table->unsignedBigInteger('inactive_by')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->string('redirect_link')->nullable();
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ideasis');
    }
}
