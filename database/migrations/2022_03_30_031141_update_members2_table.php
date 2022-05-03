<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMembers2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->after('coop_TypeL1', function ($table) {
                $table->integer('coop_TypeL2');
            });
            
        });
        Schema::table('members', function (Blueprint $table) {
            $table->after('coop_TypeL1', function ($table) {
                $table->char('coop_TypeL1Txt', 20);
            });
        });

        Schema::table('members', function (Blueprint $table) {
            $table->after('coop_TypeL2', function ($table) {
                $table->char('coop_TypeL2Txt', 20);
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
