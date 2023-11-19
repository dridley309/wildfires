Wildfires
=========

Requirements
------------
PHP 8.1+
  
Composer

The following PHP extensions;
* calendar
* PDO
* pdo_sqlite
* sqlite3
* The Symfony-required extensions outlined in https://symfony.com/doc/current/setup.html

Installation
------------
Clone repository to local device

Download the SQLite dataset from https://www.kaggle.com/datasets/rtatman/188-million-us-wildfires?resource=download

Install depedencies using Composer;
```
composer install
```
Copy the downloaded SQLite DB file to the var/ directory of the project (ensure it is named FPA_FOD_20170508.sqlite)

Run the database migrations using (this will take quite a while);
```
php bin/console doctrine:migrations:migrate
```

Enter "yes" if prompted with a warning related to migration execution in database "main"

Usage
-----
Open a terminal session

Navigate into public folder within the project directory

Run the local dev server using;
```
php -S 127.0.0.1:8000
```

Visit the specified address with your browser
