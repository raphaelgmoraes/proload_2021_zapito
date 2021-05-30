<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class InsertRecipient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $first_name = "Monique";
        $last_name = "Petris";
        $email = "monique55@admin.com.br";
        $phone = "11998756415";
        $msg = "Olá Teste !";

        DB::table('recipients')->insert([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone_number' => $phone,
            'mensagem' => $msg
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('recipients')->delete();
    }
}
