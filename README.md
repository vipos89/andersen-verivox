## Installation

Install docker on your PC and follow next steps:

- clone project from repository
- cd /{app_directory}
- cp .env.example .env
- Configure .env file (DB_HOST=db)
- run <code>docker-compose build app</code>
- start docker app <code>docker-compose up -d</code>
- run composer <code>docker-compose exec app composer install</code>
- run  <code>docker-compose exec app php artisan key:generate</code>


## Success

application available on url [http://localhost:8000](http://localhost:8000)

## How calculate tariffs

To calculate tariffs add in url kwh parameter 
example: <code>http://localhost:8000?kwh=3500</code>
