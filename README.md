## Installation Instructions

To successfully install the project, ensure Docker is installed on your system. 
Windows users must also [install and configure WSL with Docker](https://docs.docker.com/desktop/wsl/) and if you're using VSCode you must [install the extension](https://code.visualstudio.com/docs/remote/wsl). 
Follow these steps to set up the project:

1. **Environment Setup**:
   - Copy `.env.example` to `.env`.
   - Configure the database and website name in the `.env` file. To avoid conflicts with other applications running locally in docker, set the ports in the `.env` (for instance the `APP_PORT` variable) to unused ones. You can view these variables in `docker-compose.yaml`.

2. **Docker Installation Command**:
   - Navigate to the project folder and execute the following command:
     ```bash
     docker run --rm \
         -u "$(id -u):$(id -g)" \
         -v "$(pwd):/var/www/html" \
         -w /var/www/html \
         laravelsail/php83-composer:latest \
         composer install --ignore-platform-reqs
     ```
   - This command sets up the necessary environment and installs all dependencies required for the project. Note: Do not install PHP, Apache, or similar beforehand on Windows as this command handles all necessary installations.

3. **Starting the Project**:
   - Start the project using:
     ```bash
     sail up -d
     ```
   - Alternatively, you can start the project directly from Docker.

4. **Using Laravel Sail**:
   - Execute all commands (npm, php, composer, artisan) within the Dockerized application using the `./vendor/bin/sail` script. More on this [here](https://laravel.com/docs/11.x/sail#executing-sail-commands).
   - To configure a shell alias for easier use of the Laravel Sail script, see [Configuring a Shell Alias for Laravel Sail](https://laravel.com/docs/11.x/sail#configuring-a-shell-alias).
   
5. **Generate APP_KEY**
    - Generate an `APP_KEY` by running:
     ```bash
     ./vendor/bin/sail artisan key:generate
     ```
     Alternatively, if you have configured the shell alias, you can simply run:
     ```bash
     sail artisan key:generate
     ```

6. **Install npm and generate build folder**
    - Run the following command to create build folder:
    ```bash
    sail npm install && sail npm run build
     ```

7. **Database Migrations**:
   - Execute the following command to run database migrations:
     ```bash
     sail artisan migrate
     ```

8. **Creating symlink to public storage**:
   - Execute the following command to run create a symbolic link to the public storage folder:
     ```bash
     sail artisan storage:link
     ```

9. **To start server side rendering (SSR)**:
   - In the terminal run:
    ```bash
   sail artisan inertia:start-ssr
    ```
   With the server running, you should be able to access your app within the browser with server-side rendering enabled. In fact, you should be able to disable JavaScript entirely and still navigate around your application.

10. **Access the Application**:
   - Open your web browser and visit `localhost` (or `localhost:<APP_PORT>`).

For additional details on installation, running commands, or connecting to the database, refer to the [Laravel Sail documentation](https://laravel.com/docs/11.x/sail).

