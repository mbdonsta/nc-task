Installation

1. Clone project to your computer.
2. Make sure docker is running on your machine.
3. run command: cd src
4. run command: cp .env.example .env
5. run command: docker-compose up --build
6. run command: docker-compose run --rm composer install --ignore-platform-reqs
7. run command: docker-compose run --rm artisan key:generate
8. run command: docker-compose run --rm artisan migrate
9. run command: docker-compose run --rm npm install
10. run command: docker-compose run --rm npm run dev
11. run command to see if tests ar passing: docker-compose run --rm artisan test
12. Try to run application in browser: http://localhost

THIS IS TESTED ONLY ON WINDOWS 11 ENVIRONMENT
Sorry for --ignore-platform-reqs in composer install, require's more time to check for issues :)

Running

To stop container run command: docker-compose down or press CTRL + C

To start again run command: docker-compose up
