<?php
/**
 * Created by PhpStorm.
 * User: Mrad
 */

namespace App\Entity;

enum Value: int {
    case AS = 1;
    case Deux = 2;
    case Trois = 3;
    case Quatre = 4;
    case Cinq = 5;
    case Six = 6;
    case Sept = 7;
    case Huit = 8;
    case Neuf = 9;
    case Dix = 10;
    case Valet = 11;
    case Dame = 12;
    case Roi = 13;

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}