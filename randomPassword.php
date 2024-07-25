<?php

class generateRandomPassword
{
    private string $alpha;
    
    public function generatePassword($length)
    {
        $alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789&{}-(\)+/!%^*$#.';
        $password = '';
    
        for($i = 0; $i < $length; $i++) {
            $password .= $alpha[rand()%strlen($alpha)];
        }
    
        return $password;
    }
}


$w = new generateRandomPassword;
echo 'Mot de passe : ' . $w->generatePassword(54);