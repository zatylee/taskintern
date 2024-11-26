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
        Schema::create('formb', function (Blueprint $table) {
            $table->id();
            $table->string('union_name');
            $table->text('registered_address');
            $table->date('meeting_date');
            $table->string('branch');
            $table->string('union_type');
            $table->string('sector');
            $table->string('industry');
            $table->integer('member_count');
            $table->date('application_date');
            $table->string('meeting_type');
            $table->string('secretary_name');
            $table->timestamps();
        });
    }
s
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formb');
    }
};
