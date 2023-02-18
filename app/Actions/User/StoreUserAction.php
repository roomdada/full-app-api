<?php
namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;

final class StoreUserAction
{
    public function execute(array $data): User
    {
        DB::beginTransaction();

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'contact' => $data['contact'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        DB::commit();
        return $user;
    }
}
