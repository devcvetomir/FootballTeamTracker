##
-   ```bash
     git pull 
- edit .env db info
- ```bash
  composer install && php artisan migrate:fresh --seed

Seeded User: admin@admin.com / password: admin

За тоукън : /api/v1/token , трябва да върне тоукъна. , Bearer Token, за проверка - /api/v1/check-token
##  Routes


- **GET**    api/v1/players/
- **GET|HEAD**    api/v1/players/{player}
- **PUT|PATCH**    api/v1/players/{player}
- **DELETE**    api/v1/players/{player}

### Teams

- **GET|HEAD**    api/v1/teams
- **POST**    api/v1/teams
- **GET|HEAD**    api/v1/teams/{team}
- **PUT|PATCH**    api/v1/teams/{team}
- **DELETE**    api/v1/teams/{team}

### Authentication

- **POST**    api/v1/token   / body : email /password 


Енфорснато е 'Accept', 'application/json' / и трябва да се сетне в curl .




