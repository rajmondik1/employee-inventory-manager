
## Symfony mysql ngingx boilerplate on docker with rabbitmq
#### To start go to app/:
```cd app```
#### Create env file and change required fields 
```cp .env.example .env```
#### Build docker containers
```(sudo) docker-compose build```
#### Start the containers
```docker-compose up```
#### Go inside php docker container
```docker exec -ti php-container bash```
#### Then install dependencies
```composer install```

#### That's it! go to localhost:8080