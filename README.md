
steps on how to run the project:

1. unzip the folder. then, open a cmd and go to the location of the unzipped folder. for example, the unzipped folder i had was in "Desktop". 
   the cmd will look like this: " C:\Users\JAMESROYD\Desktop\PCBMS\ ".

2. in the cmd, install/download composer. this may need internet connectivity. run composer install command in the cmd. for example: " C:\Users\JAMESROYD\Desktop\PCBMS\composer install ". wait for download to be done.

3. open VSCode or any code editor. locate the .env file and see the line which had DB_DATABASE = local_database . In your mysql phpMyAdmin, create a new database named "local_database". you can change "DB_DATABASE" into your own preference. for example, DB_DATABASE = your_database_name and make sure to create a database in mysql that is named "your_database_name".

4. Run Migration. Please manually migrate the migration file in cmd following this order. Make sure that the you were still inside the PCBMS folder, \PCBMS in your cmd.
	- php artisan migrate --path=database\migrations\2023_12_08_134130_create_addresses_table.php 
	- php artisan migrate --path=database\migrations\2014_10_12_000000_create_users_table.php
	- php artisan migrate --path=database\migrations\2023_12_08_141218_create_customers_table.php
	- php artisan migrate --path=database\migrations\2023_12_08_140609_create_suppliers_table.php

	lastly, run the php artisan migrate to migrate all the remaining migration file.

5. Run the database seeder. This is for seeded records for some of the tables. in your cmd, run php artisan db:seed command.
6. In the cmd, run php artisan key:generate and php artisan storage:link command.
7. In the cmd, run the npm run dev.
8. Lastly, run the php artisan serve. This will generate the 127.0.0.1:8000 link. Ctr + clicking it will redirect you to the browser or you can simply type the link in the url

Credentials:

for admin:
email: admin@example.com
password: password

for cashier:
email:cashier@example.com
password: password

or 

email:user@example.com
password: password