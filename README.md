## Blog 3
A blog, with authentication and a rating system, scaffolded by Laravel

## Installation instructions
-   Clone this repository: `git clone https://github.com/TomWGreen/blog3.git`
-   Shift focus: `cd blog1/`
-   Install the dependencies: `composer install`
-   Create a new database & create/update the `.env` file accordingly
-   Generate an encryption key `php artisan key:generate`
-   Run the migrations: `php artisan migrate` 
-   Lunch the built-in PHP webserver `php artisan serve`
-   Visit: [http://127.0.0.1:8000/] to see the blog landing page

## Test suite
-   Seed dummy data: `php artisan db:seed`
-   Execute test suite: `php artisan dusk`

