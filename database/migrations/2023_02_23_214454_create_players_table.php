<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->integer('first_name_visibility')->default(1);
            $table->string('last_name');
            $table->integer('last_name_visibility')->default(1);
            $table->string('nickname')->nullable();
            $table->integer('nickname_visibility')->default(1);
            $table->date('birth_date')->nullable();
            $table->integer('birth_date_visibility')->default(1);
            $table->string('photo')->nullable();
            $table->integer('photo_visibility')->default(1);
            $table->string('shirt_number')->nullable();
            $table->integer('shirt_number_visibility')->default(1);
            $table->string('about')->nullable();
            $table->integer('about_visibility')->default(1);
            $table->foreignId('user_id')->nullable()->nullOnDelete()->constrained();
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players', function(Blueprint $table){
            $table->dropForeign('players_user_id_foreign');
            $table->dropSoftDeletes();
        });
    }
};
