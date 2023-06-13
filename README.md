# PHP_OOP_PLANNING_TOOL_2

### Prerequisites
    - Apache Server
    - MySql Database
    - Composer
        - Dependencies:
            * https://github.com/vlucas/phpdotenv
    - .env setup

##### Composer install depenendies
```$ composer require vlucas/phpdotenv```

##### Variable composition @ .env
```
HOSTNAME=""
USERNAME=""
PASSWORD=""
DATABASE=""
```


### Task list
- [] Add user registration & login
- [] Add user authentication
    - User is not activated after registration
    - User must be activated after registration
- [] Add user roles & auth control
- [] Define pages and directories from database
    - Users can only access pages/directories they are given access to
- [] User information page (CRUD)


##### Additonal future tasks