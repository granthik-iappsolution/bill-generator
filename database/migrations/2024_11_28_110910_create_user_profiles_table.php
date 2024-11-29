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
    public function up() {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('email')->nullable();
            $table->integer('mobile')->nullable();
            $table->string('website')->nullable();
            $table->boolean('is_company')->default(false);
            $table->string('logo')->nullable();
            $table->string('sign')->nullable();
            $table->string('upi_code')->nullable();
            $table->unsignedBigInteger('default_template_id')->nullable();
            $table->boolean('enable_gst')->default(false);
            $table->string('gstin')->nullable();
            $table->integer('default_bill_due_in')->default(30)->nullable();
            $table->longText('default_terms')->nullable();
            $table->boolean('enable_shipping')->default(false);
            $table->string('currency_code', 5)->nullable();
            $table->string('country_code', 5)->nullable();
            $table->string('uuid')->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('user_profiles');
    }
};
