<?php
/**
 * Created by PhpStorm.
 * User: Mrad
 * Date: 10/08/2022
 */

namespace App\Controller;

use App\Service\CardService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/v1')]
class CardControllerApi extends AbstractController
{
    private $cardService;
    public function __construct(CardService $cardService)
    {
        $this->cardService = $cardService;
    }
    #[Route('/random-deck', methods: ['GET'])]
    public function getCards(): Response
    {
        $deck = $this->cardService->createDeckOfCards();
        return $this->json($deck,Response::HTTP_OK,['Content-Type' => 'application/json']);
    }

    #[Route('/sorted-deck',  methods: ['POST'])]
    public function getSortedCards(Request $request, ValidatorInterface $validator): Response
    {
        try {
            $data = json_decode($request->getContent(), true);
            $cards = [];
            foreach ($data as $d){
                $cards[]= $this->cardService->CreateCard($d);
            }
            $violations = $validator->validate($cards);
            if (count($violations) > 0) {
                $errors = [];
                foreach ($violations as $violation) {
                    $errors[$violation->getPropertyPath()][] = $violation->getMessage();
                }
                return $this->json(['errors' => $errors], Response::HTTP_BAD_REQUEST);
            }
            $sortedDeck = $this->cardService->SordtedDeckOfCards($cards);
            return $this->json($sortedDeck,Response::HTTP_OK,['Content-Type' => 'application/json']);
        }catch (\Exception $e) {
            // Handle the exception
            return $this->json(['message' => 'Bad request: ' . $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}