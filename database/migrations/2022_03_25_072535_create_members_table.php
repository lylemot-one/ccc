<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id('coop_MID');
            $table->integer('coop_Type');
            $table->char('info_FName', 20);
            $table->char('info_LName', 20);
            $table->char('info_MName', 20);
            $table->string('info_Address, 100');
            $table->char('info_Tel', 10)->nullable();
            $table->char('info_Cell', 12);
            $table->char('info_EAdd', 30);
            $table->date('info_BDay');
            $table->char('info_BPlace', 20);
            $table->char('info_CStatus', 10);
            $table->char('info_Gender', 1);
            $table->char('info_Citizen', 15);
            $table->char('info_Income', 20);
            $table->integer('info_MthIncome');
            $table->char('info_Education', 10);
            $table->char('info_Spouse', 30)->nullable();
            $table->integer('emp_ID')->nullable();
            $table->integer('emp_Status')->nullable();
            $table->char('emp_Dept', 20);
            $table->char('emp_Pos', 20);
            $table->integer('emp_TelWork')->nullabe();
            $table->integer('emp_TIN');
            $table->integer('emp_GSIS');
            $table->bigInteger('updated_by');
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
        Schema::dropIfExists('members');
    }
}
