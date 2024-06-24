<?php
/**
 * Created by PhpStorm.
 * User: Mrad
 */

namespace App\Entity;

enum Color: string {
    case Carreaux = 'Carreaux';
    case Coeur = 'Cœur';
    case Pique = 'Pique';
    case Trefle = 'Trèfle';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}