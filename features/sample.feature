Feature:
    In order to prove that the coordinate endpoint works properly

    Background:
        Given clean wiremock

    Scenario: after the scenario there should be an item in products table
#        When I send a "GET" request to "/test"
        Given Created entities of "\App\Entity\Product" with
            | name      | price |
            | fruitTea  | 1000  |
            | fruitTea  | 1000  |
        Then Instance of "\App\Entity\Product" with "name" equal to "fruitTea" contains the following data:
            | name      | price |
            | fruitTea  | 1000  |