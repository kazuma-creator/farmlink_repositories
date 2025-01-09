<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTemplateIdToCropsTable extends Migration
{
    public function up()
    {
        Schema::table('crops', function (Blueprint $table) {
            $table->unsignedBigInteger('template_id')->nullable()->after('user_id');
            $table->foreign('template_id')->references('id')->on('templates');
        });
    }

    public function down()
    {
        Schema::table('crops', function (Blueprint $table) {
            $table->dropForeign(['template_id']);
            $table->dropColumn('template_id');
        });
    }
}
