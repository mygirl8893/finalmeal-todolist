# Final Meal TODO List

Just another TODO app to show some basic and new features on Symfony 3.

## Installation

	composer install
	
## Run the server
   
   php bin/console server:run

Check the application: http://localhost:8000/

## Commands

I have used the following comamnds, let me write a little note for me to remember :)
 
### Generate a Doctrine Entity

    php bin\console doctrine:generate:entity
    
### Update Database Schema

    php bin\console doctrine:schema:update --force
 
### Generate a Form from a Doctrine Entity

    doctrine:generate:entity AppBundle:Todo

