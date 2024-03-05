# The steps

## TLDR (Too long didn't read)

Right now I'm still at a phase of implementing the Controllers. I finally understand the whole structure of laravel. I just need more exercises for implementating. This video tutorial helped me a lot to understand Laravel -> https://www.youtube.com/watch?v=2mqsVzgsV_c. I haven't started on the second Task because I'm only familar with PHP, HTML and SQL but not CSS. This helps me to focus on implementating PHP code since CSS is distracting me. Overall it's a good experience for me.

## Controllers

- To add a model by declaring variables and add ProductController with template methods to modify.

```
$ php artisan make:controller ProductController --resource

   INFO  Controller [app/Http/Controllers/ProductController.php] created successfully.

$ php artisan make:controller HomeController

   INFO  Controller [app/Http/Controllers/HomeController.php] created successfully.

$ php artisan make:controller FallbackController

   INFO  Controller [app/Http/Controllers/FallbackController.php] created successfully.
```

## Database Setup

```
$ sudo mysql
CREATE DATABASE laravelapp;
ALTER USER 'root'@'localhost' IDENTIFIED VIA mysql_native_password USING PASSWORD('password123');
FLUSH PRIVILEGES;

$ nano .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelapp
DB_USERNAME=root
DB_PASSWORD=password123
```

### Migrations

```
$ php artisan make:migration create_products_table

   INFO  Migration [database/migrations/2024_03_05_160048_create_products_table.php] created successfully.
```

- After declaring variables

```
$ php artisan migrate

   INFO  Running migrations.  

  2014_10_12_000000_create_users_table ................................................................................................... 66ms DONE
  2014_10_12_100000_create_password_reset_tokens_table ................................................................................... 21ms DONE
  2019_08_19_000000_create_failed_jobs_table ............................................................................................. 66ms DONE
  2019_12_14_000001_create_personal_access_tokens_table ................................................................................. 108ms DONE
  2024_03_05_160048_create_products_table ................................................................................................ 64ms DONE
  ```

- Empty the database.

```
$ php artisan migrate:reset

   INFO  Rolling back migrations.  

  2024_03_05_160048_create_products_table ................................................................................................ 21ms DONE
  2019_12_14_000001_create_personal_access_tokens_table .................................................................................. 19ms DONE
  2019_08_19_000000_create_failed_jobs_table ............................................................................................. 26ms DONE
  2014_10_12_100000_create_password_reset_tokens_table ................................................................................... 19ms DONE
  2014_10_12_000000_create_users_table ................................................................................................... 19ms DONE
```

- Even after the migration was executed the data can be refreshed. This is similar to resetting the migration and add the data.

```
$ php artisan migrate:refresh

 INFO  Rolling back migrations.
   ..[snip]..

   INFO  Running migrations.  
   ..[snip]..
```

### Seeders (useful to populate the database instead of making a sample data manually)

```
$ php artisan make:seeder ProductsTableSeeder

   INFO  Seeder [database/seeders/ProductsTableSeeder.php] created successfully.

$ php artisan make:model Product

   INFO  Model [app/Models/Product.php] created successfully.
```

- After modifying the PHP files (including DatabaseSeeder.php) and adding variables of name,description and price. It's time to populate the data of seeders by inserting data (check ProductsTableSeeder.php).

- Ensure `$table->timestamps();` is present in the migration when modifying `up()` method. If the error was encountered like this:

```
$ php artisan db:seed
   Illuminate\Database\QueryException 

  SQLSTATE[42S22]: Column not found: 1054 Unknown column 'updated_at' in 'field list' (Connection: mysql, SQL: insert into `products` (`name`, `description`, `price`, `updated_at`, `created_at`) values (Banana, This is a banana contains potassium, 4, 2024-03-05 16:20:30, 2024-03-05 16:20:30))
```

- Refresh the migration in order to insert the data. It should work properly when you refresh.

```
$ php artisan migrate:refresh

$ php artisan db:seed
   INFO  Seeding database.  

  Database\Seeders\ProductsTableSeeder ..................................................................................................... RUNNING  
  Database\Seeders\ProductsTableSeeder .................................................................................................. 21 ms DONE 
```

## Populate the data using Factories

### Create ProductFactory

```
$ php artisan make:factory ProductFactory

   INFO  Factory [database/factories/ProductFactory.php] created successfully.
```

- After declaring placeholders to populate data and modifying DatabaseSeeder to call the ProductFactory. It's time to populate the data and it should run without any issue.

```
$ php artisan db:seed

   INFO  Seeding database.
```
