<p align="center"><a target="_blank"><img src="https://cdn-new.topcv.vn/unsafe/140x/https://static.topcv.vn/company_logos/cong-ty-tnhh-mtv-jho-tech-5ec916c8661e3.jpg" width="140px" height="140px" alt="Logo"></a></p>

## Postman Documentation

- [Postman](https://documenter.getpostman.com/view/24644260/2sAYBPktic)

## Requirements

- **[PHP](https://www.php.net/)**
- **[Composer](https://getcomposer.org/)**
- **[Laravel](https://laravel.com/docs/11.x)**
- **[XAMPP](https://www.apachefriends.org/download.html)**

## How to install
### php.ini file
Make sure that your php.ini file has uncommented for 
`extension=openssl`<br>
`extension=pdo_mysql`<br>
`extension=mysqli`<br>
`extension=mbstring`<br>
`extension=fileinfo`<br>
`extension=curl`<br>
`extension=zip`<br>

### 1. Clone the repository
Find a location on your computer where you want to store the project.
Open CMD and clone the project.

`git clone https://github.com/kcirscross/test-laravel-project`

### 2. CD into the project
You will need to be inside the project directory that was just created, so cd into it.

`cd project_name`

### 3. Install composer dependencies
Whenever you clone a new Laravel project you must now install all of the project dependencies. This is what actually installs Laravel itself, among other necessary packages to get started.

`composer install`

### 4. Copy the .env file
.env files are not generally committed to source control for security reasons. But there is a .env.example which is a template of the .env file that the project requires.
So you should make a copy of the .env.example file and name it .env so that you can setup your local deployment configuration in the next few steps.

`cp .env.example .env`

### 5. Generate an app encryption key
Laravel requires you to have an app encryption key which is generally randomly generated and stored in your .env file. The app will use this encryption key to encode various elements of your application from cookies to password hashes and more.
Laravel’s command line tools thankfully make it easy to generate this. Run this command in the terminal to generate that key.

`php artisan key:generate`

### 6. Create an empty database for the application
Create an testproject database for project using the database tools([phpmyadmin](http://localhost/phpmyadmin/)).

### 7. Migrate the database
Once your credentials are in the .env file, now you can migrate your database. This will create all the necessary tables in your database.

`php artisan migrate`

### 8. Seed the database
Once you do migrate your database. This will create data in your database.

`php artisan db:seed`<br>
`php artisan db:seed --class=ContactSeeder`<br>
`php artisan db:seed --class=ListSeeder`<br>
`php artisan db:seed --class=OpportunitySeeder`<br>
`php artisan db:seed --class=TagSeeder`<br>
`php artisan db:seed --class=TaskSeeder`

## Local development server
To run a local development server you may run the following command. This will start a development server at **http://localhost:8000**.

`php artisan serve`
