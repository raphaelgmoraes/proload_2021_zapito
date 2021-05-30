<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class InsertUserAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = env('USER_ADMIN', 'admin');
        $email = env('USER_EMAIL', 'admin@admin.com.br');
        $passwd = bcrypt(env('USER_PASSWD_ADMIN', '123456'));

        DB::table('users')->insert([
            'name' => $user,
            'email' => $email,
            'password' => $passwd
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $email = env('USER_EMAIL', 'admin@admin.com.br');
        DB::delete('delete users where email = ?', [$email]);
    }
}
