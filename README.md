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