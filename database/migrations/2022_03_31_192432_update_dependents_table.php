<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDependentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dependents', function (Blueprint $table) {
            $table->after('id', function ($table) {
                $table->bigInteger('coop_MID');
                $table->char('dpdnt_Name', 40);
                $table->date('dpdnt_DOB');
                $table->char('dpdnt_Rel', 20);
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
