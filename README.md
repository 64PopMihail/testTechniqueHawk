# Test Technique Hawk

## Pré-requis

- Docker

## Installation

Pour initialiser le projet, tapez la commande dans votre terminal :
```bash
make init
```

## Tester l'api

Avec Insomnia / Postman envoyez une requête sur l'url "http://localhost/api". Un exemple de corps de requête :
```json
[
  {
    "lat": 48.8759992,
    "lon": 2.3481253,
    "name": "Arc de triomphe"
  },
  {
    "lat": 48.86,
    "lon": 2.35,
    "name": "Chatelet"
  }
]
```

Pour lancer le test unitaire dans un terminal, lancez les tests avec ces commandes 
```bash
make bash
vendor/phpunit/phpunit/phpunit
```