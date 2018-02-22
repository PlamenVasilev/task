siteground
==========

## Installation
* create mysql database & user
* Unzip the code
* run `composer install` and fill database parameters
* create database schema `php app/console doctrine:schema:create`
* insert test data
```sql
INSERT INTO items SET id='1', sku='A', price=50;
INSERT INTO items SET id='2', sku='B', price=30;
INSERT INTO items SET id='3', sku='C', price=20;
INSERT INTO items SET id='4', sku='D', price=15;
INSERT INTO item_promo SET item_id=1, count=3, price=130;
INSERT INTO item_promo SET item_id=2, count=2, price=45;
```
* run the build in http server using `php app/console server:run`
* open `http://127.0.0.1:8000` in your browser

## Testing
* run `./bin/simple-phpunit -c app/` 