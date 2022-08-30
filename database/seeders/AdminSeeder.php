<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','Square1@gmail.com')->first();
        if (!empty($user)) {
            $out = new \Symfony\Component\Console\Output\ConsoleOutput();
            $out->writeln("Admin User Already Added");
            exit;
        }else{
            User::create([
                'name' => 'Admin User',
                'email' => 'Square1@gmail.com',
                'username' => 'Admin User',
                'password' => 'Admin@123',
                'is_admin' => '1'
            ]);
        }
    }
}
