# Symfony API
##### Add the Menu entity
- id
- title
- items -array<Item>
##### Add entity Item
- id
- title
- menu-Menu

Add api method /api/v1/menu/list, which returns json with the last 3 menus with all items items. Serialization of entities is done through symfony serializer


### Usage

1. clone https://github.com/ArmanAraqelyan/symfony.git
2. run `composer install`
3. setup `.env`
4. run `php bin/console make:migration`
5. run `php bin/console doctrine:migrations:migrate`
6. run `php bin/console doctrine:fixtures:load`
7. send a request to `/api/v1/menu/list` to get the result

