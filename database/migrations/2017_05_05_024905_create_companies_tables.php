<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->text('company_address');
            $table->string('company_mobile');
            $table->string('company_email')->nullable();
            $table->string('company_website')->nullable();
            $table->text('company_description')->nullable();

            $table->string('representative_name');
            $table->text('representative_mobile');
            $table->string('representative_email');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('companies');
    }
}
