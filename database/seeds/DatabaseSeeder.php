<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //$this->call(seedUserTable::class);
        $this->seedUserTable();

        Model::reguard();
    }

    /**
     * omplir taula user
     */
    private function seedUserTable(){

        $user = new User();
        $user->name = 'Oscar Duran';
        $user->password = bcrypt(env('PASSWORD_ESTIMAT','123456'));
        $user->email = 'oscarduran@iesebre.com';
        $user->save();

    }
}
