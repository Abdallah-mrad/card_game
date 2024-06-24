<?php
/**
 * Created by PhpStorm.
 * User: Mrad
 */

namespace App\Tests\service;

use App\Entity\Color;
use App\Entity\Value;
use App\Service\CardService;
use PHPUnit\Framework\TestCase;

class CardServiceTest extends TestCase
{

    private $cardService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->cardService = new CardService();
    }
    public function testCreateCard() {
        $data = [
            'color' => Color::Pique->value,
            'value' => Value::AS->value,
        ];

        $card = $this->cardService->CreateCard($data);

        $this->assertEquals($data['color'], $card->getColor());
        $this->assertEquals($data['value'], $card->getValue());
    }

    public function testCreateDeckOfCards() {
        $deck = $this->cardService->createDeckOfCards();

        $this->assertCount(10, $deck);

        foreach ($deck as $card) {
            $this->assertContains($card->getColor(), Color::getValues());
            $this->assertContains($card->getValue(), Value::getValues());
        }
    }

    public function testSortedDeckOfCards() {
        $deck = $this->cardService->createDeckOfCards();
        $sortedDeck = $this->cardService->SordtedDeckOfCards($deck);

        $this->assertCount(10, $sortedDeck);

        for ($i = 0; $i < count($sortedDeck) - 1; $i++) {
            if ($sortedDeck[$i]->getColor() === $sortedDeck[$i + 1]->getColor()) {
                $this->assertLessThanOrEqual($sortedDeck[$i + 1]->getValue(), $sortedDeck[$i]->getValue());
            } else {
                $this->assertLessThan(0, strcmp($sortedDeck[$i]->getColor(), $sortedDeck[$i + 1]->getColor()));
            }
        }
    }
}