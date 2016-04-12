# API parti_gauche_adherents


## Installation
First things first : **clone the project**

`git clone git@github.com:LePartiDeGauche/adherents-platform.git`

Run installation via composer.
`composer install`


Now you can install your database
```shell
php app/console doctrine:database:create && php app/console doctrine:schema:update --force
```

Creating a test user
```shell
php app/console fos:user:create test test@les-tilleuls.coop test
```

To run your symfony server
```shell
php app/console server:start
```

You can now see a first interface of the api router on your local url :
`http://localhost:8000/doc`

To make an api request, example to get the people data :
`http://localhost:8000/api/people`

To load doctrine fixtures :
`php app/console doctrine:fixtures:load`

To append doctrine fixtures :
`php app/console doctrine:fixtures:load --append`