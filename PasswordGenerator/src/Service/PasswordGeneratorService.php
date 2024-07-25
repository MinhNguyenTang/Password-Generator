<?php

namespace App\Service;

class PasswordGeneratorService {

    private string $alpha;

    public function generatePassword($length)
    {
        $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789&{}-(\)+/!%^*$#.';
        $password = '';
    
        for($i = 0; $i < $length; $i++) {
            $password .= $alpha[rand()%strlen($alpha)];
        }
    
        return $password;
    }
}