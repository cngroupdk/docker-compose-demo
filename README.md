CN Group InDeEd: docker-compose
========================

This is a demo PHP Symfony application used to show an example of what we can do with Docker and docker-compose.

First Steps
-----------

1) Copy .env.example to .env
2) Open a terminal window
3) Change to the project directory:  
`cd /Users/user/PhpstormProjects/docker-compose-demo` 
4) Start the application:
`docker-compose up`
5) Start a new console session inside the application's container:  
`docker exec -it dockercomposedemo_demo-fpm_1 bash`
6) Install composer dependencies:  
`composer install`  
When asked to provide parameters, pressing enter to leave the defaults should be fine.
7) Create the database:  
`app/console doctrine:database:create`
8) Create tables in the database
`app/console doctrine:schema:create`
9) In your browser, visit `http://localhost:1234/app_dev.php`

Running Tests
-------------
1) Start a new console session inside the application's container (if not already done):  
`docker exec -it dockercomposedemo_demo-fpm_1 bash`
2) Run: `bin/behat`

If you want to see the test browser window, use a VNC client to connect to:
Host: localhost  
Port: 1235  
Password: secret  

To pause and step through the tests, use:  
`bin/behat --step-through`