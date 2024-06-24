Introduction
run these commands first :
1 "git clone https://github.com/Abdallah-mrad/card_game.git"
2 "composer install"
3 under the public directory run "php -S localhost:5000"
make sure you have at least PHP >= "8.2" and last version of composer
This project is a PHP implementation of a card game using symfony "7.1" and PHP >= "8.2".
It includes the creation and sorting of a deck of cards. The cards have different colors and values, and the deck can be sorted based on these properties.
# Project Structure
.github
│   └── workflows
│       └── test_before_deploy.yml
│
src
├── Controller
│   ├── CardControllerApi.php
│
├── Entity
│   ├── Card.php
│   └── Color.php
│    ├── Value.php
├── Service
│   ├── CardService.php
│   └── CardServiceInterface.php
│
├── tests
│   ├── Controller
│   │     └── CardControllerApiTest.php
│   ├── service
│         └── CardServiceTest.php
├── vendor
│
├── README.md
The project is organized into the following directories and files:
Directories

# .github
test_before_deploy.yml file uses githubAction services to make sure that before evrey push request we run tests 

# src
Entity: Contains the entity classes for the project, such as Card, Color, and Value.
Service: Contains the service classes, such as CardService.
Controller: Contains the controller class, CardControllerApi.

# tests
test the CardControllerApi class througth CardControllerApiTest class
test the CardService class througth CardServiceTest class


# vendor:
This directory contains the third-party dependencies, such as PHPUnit.

# Entity Classes:
Card: Represents a playing card with a color and a value.
Color: An enum representing the different card colors.
Value: An enum representing the different card values.
# Service Classes:
CardService: Provides methods for creating cards, creating a deck of cards, and sorting a deck of cards.
# Controller Class:
CardControllerApi: Handles the API endpoints for getting a random deck of cards and getting a sorted deck of cards.
Usage
# Getting a Random Deck of Cards:
Send a GET request to the /api/v1/random-deck endpoint to get a random deck of 10 cards.
# Getting a Sorted Deck of Cards:
Send a POST request to the /api/v1/sorted-deck endpoint with a JSON payload containing an array of card data (color and value).
The API will validate the input data and return a sorted deck of cards.


# generate code coverage repport 
juste run this commande "./vendor/bin/phpunit tests --coverage-html tests-result-coverage --coverage-filter classes"
it will generate  a directory "tests-result-coverage" including code coverge repport in the "dashboard.html"


NB you we only we can implement DTO for the future and swagger documentation


