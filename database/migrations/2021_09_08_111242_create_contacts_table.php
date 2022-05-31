<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('contact_id');
            $table->foreignId('user_id')->constrained('users', 'user_id');
            $table->string('fullname', 150)->nullable();
            $table->string('shortname', 50)->nullable();
            $table->text('biography')->nullable();
            $table->enum('gender', ['Male', 'Female'])->default('Male');
            $table->string('phonenumber', 25);
            $table->string('emailaddress', 100);
            $table->string('contactaddress');
            $table->string('meet_at', 100);
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
        Schema::dropIfExists('contacts');
    }
}
