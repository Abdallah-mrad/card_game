<?php
/**
 * Created by PhpStorm.
 * User: Mrad
 */

namespace App\Service;


interface CardServiceInterface
{
    public function CreateCard($data);
    public function createDeckOfCards():Array;
    public function SordtedDeckOfCards($deck):Array;


}