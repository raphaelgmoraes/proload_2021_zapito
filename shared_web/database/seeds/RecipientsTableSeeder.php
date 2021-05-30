<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;
use App\Models\Recipients;

class RecipientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Factory melhor jeito */

        Factory(Recipients::class, 10)->create();
        
        
        /** Executa com o comando Seeder cada vez */
        // $random_number = mt_rand(90000000, 99999999);
        // $first_name = Str::random(4);
        // $last_name = Str::random(4) . " " . Str::random(4);
        // $email = Str::random(4) . "@admin.com.br";
        // $phone = "219" .  $random_number;
        // $msg = "Olá Teste";

        // DB::table('recipients')->insert([
        //     'first_name' => $first_name,
        //     'last_name' => $last_name,
        //     'email' => $email,
        //     'phone_number' => $phone,
        //     'mensagem' => $msg
        // ]);
    }
}