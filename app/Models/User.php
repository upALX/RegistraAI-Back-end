<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $fillable = ['email', 'password'];

    public function saveToFile($data)
    {
        $filePath = storage_path('users.json');

        if (file_exists($filePath)) {
            $currentData = json_decode(file_get_contents($filePath), true);
        } else {
            $currentData = [];
        }

        $currentData[] = [
            'email' => $data['email'],
            'password' => Hash::make($data['password']), 
        ];

        file_put_contents($filePath, json_encode($currentData, JSON_PRETTY_PRINT));
    }

    public static function userExists($email)
    {
        $filePath = storage_path('users.json');

        if (file_exists($filePath)) {
            $currentData = json_decode(file_get_contents($filePath), true);
            foreach ($currentData as $user) {
                if ($user['email'] === $email) {
                    return true; 
                }
            }
        }

        return false; 
    }
}
