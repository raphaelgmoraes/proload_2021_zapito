<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RecipientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $random_number = mt_rand(90000000, 99999999);
        $first_name = Str::random(4);
        $last_name = Str::random(4) . " " . Str::random(4);
        $email = Str::random(4) . "@admin.com.br";
        $phone = "219" .  $random_number;
        $msg = "Olá Teste";

        DB::table('recipients')->insert([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone_number' => $phone,
            'mensagem' => $msg
        ]);
    }
}