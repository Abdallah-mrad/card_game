<?php
/**
 * Created by PhpStorm.
 * User: Mrad
 */

namespace App\Service;

use App\Entity\Card;
use App\Entity\Color;
use App\Entity\Value;

class CardService implements CardServiceInterface
{


    public function CreateCard($data)
    {
        $card = new Card();
        $card->setColor($data['color']);
        $card->setValue($data['value']);
        return $card;
    }

    public function createDeckOfCards(): Array {
        $colors = Color::cases();
        $values = Value::cases();
        $deck = [];
        for ($i = 0; $i < 10; $i++) {
            $randomKeyColor = array_rand($colors);
            $randomKeyValue = array_rand($values);
            $randomColor = $colors[$randomKeyColor];
            $randomValue = $values[$randomKeyValue];

            $data['color'] = $randomColor->value;
            $data['value'] = $randomValue->value;
            $deck[] = $this->CreateCard($data);
        }
        return $deck;
    }

    public function SordtedDeckOfCards($deck): Array {
        usort($deck, function($a, $b) {
            if ($a->getColor() === $b->getColor()) {
                return $a->getValue() - $b->getValue();
            } else {
                return strcmp($a->getColor(), $b->getColor());
            }
        });
        return $deck;
    }
}