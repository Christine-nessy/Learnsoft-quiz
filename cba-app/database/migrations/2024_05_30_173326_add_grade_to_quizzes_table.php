<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddgradeToQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->unsignedBigInteger('grade_id')->nullable(); // Add the grade column
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade'); // Set up the foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropForeign(['grade_id']); // Drop the foreign key constraint
            $table->dropColumn('grade_id'); // Drop the grade column
        });
    }
}
