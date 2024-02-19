<?php

namespace App\Models;

class Nombre
{
    public static function estPremier($nombre) {
        if ($nombre <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($nombre); $i++) {
            if ($nombre % $i == 0) {
                return false;
            }
        }
        return true;
    }
}