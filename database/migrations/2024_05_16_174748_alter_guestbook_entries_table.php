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
    public function up()
    {
        if(Schema::hasColumn('guestbook_entries', 'submitter_email')) {
            Schema::table('guestbook_entries', function (Blueprint $table) {
                $table->dropColumn('submitter_email');
            });
        }

         if(Schema::hasColumn('guestbook_entries', 'submitter_display_name')) {
            Schema::table('guestbook_entries', function (Blueprint $table) {
                $table->dropColumn('submitter_display_name');
            });
        }

        if(Schema::hasColumn('guestbook_entries', 'submitter_real_name')) {
            Schema::table('guestbook_entries', function (Blueprint $table) {
                $table->dropColumn('submitter_real_name');
            });
        }

         if(!Schema::hasColumn('guestbook_entries', 'user_id')) {
            Schema::table('guestbook_entries', function (Blueprint $table) {
                $table->integer('user_id');
            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(!Schema::hasColumn('guestbook_entries', 'submitter_email')) {
            Schema::table('guestbook_entries', function (Blueprint $table) {
                $table->string('submitter_email');
            });
        }

         if(!Schema::hasColumn('guestbook_entries', 'submitter_display_name')) {
            Schema::table('guestbook_entries', function (Blueprint $table) {
                $table->string('submitter_display_name');
            });
        }

         if(!Schema::hasColumn('guestbook_entries', 'submitter_real_name')) {
            Schema::table('guestbook_entries', function (Blueprint $table) {
                $table->string('submitter_real_name');
            });
        }

        if(Schema::hasColumn('guestbook_entries', 'user_id')) {
            Schema::table('guestbook_entries', function (Blueprint $table) {
                $table->dropColumn('user_id');
            });
        }
    }
};