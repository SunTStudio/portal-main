<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_websites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sampul');
            $table->string('link');
            $table->text('departments')->default('semua');
            $table->text('detail_departements')->default('semua');
            $table->text('positions')->default('semua');
            $table->text('users')->default('semua');
            $table->text('role')->nullable();
            $table->string('kategori');
            $table->string('jenis');
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
        Schema::dropIfExists('sub_websites');
    }
}
