# Section 3: Database Data: Migrations and Models

References:
- https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39182468#overview

---
 
## Move to the project directory
```bash
cd cogeigniter/03-db-migrations/ci-app

``` 

## Run the built-in PHP Server
- In the terminal, navigate to the `ci-app` directory if you're not already there:
- Start the built-in PHP server:
    ```bash
    php spark serve
    ```
  - Open your web browser and navigate to `http://localhost:8081` to see the CodeIgniter welcome page.

- Stop the server by pressing `CTRL + C` in the terminal when you're done.

---

## Database Configuration

**`Config/Database.php`**
- Open the `ci-app/app/Config/Database.php` file in your code editor.
- This file should only contain the default settings for connecting to a database.

**`.env` File**
- Open the `.env` file located in the root directory of your project.

**Run MySQL Docker Container**
```bash
if [ "$(docker container ls -aq -f name=mysql-container)" ]; then
  echo "MySQL container already exists. Starting the container..."
  docker container start mysql-container
else
  echo "Creating and starting MySQL container..."
  docker container run --name mysql-container -e MYSQL_ROOT_PASSWORD=Axml-xsl0123 -p 3306:3306 -d mysql:latest
fi
---

## Database Migrations
References:
- https://codeigniter.com/user_guide/dbmgmt/forge.html
- https://codeigniter.com/user_guide/dbmgmt/migration.html


### Create a Migration File
```bash
php spark make:migration CreateArticleTable

- OUTPUT:

  CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-01-18 15:58:38 UTC+00:00

  File created: APPPATH/Database/Migrations/2026-01-18-155838_CreateArticleTable.php
```

###  Run the Migration
Recommended method is to use the CLI command as it gives better feedback than using the web interface via a controller.
```bash
php spark migrate

- OUTPUT:
  Running all new migrations...
  Running: (App) 2026-01-18-155838_App\Database\Migrations\CreateArticleTable
  Migrations complete.
  
```
We can see the tables created in the datbase using MySQLWorkbench or any database management tool:
 - articles
 - migrations

### Insert Sample Data into the Articles Table
In MySQLWorkbench, run the following SQL commands to insert sample data into the `articles` table:
```SQL
USE ci4;
INSERT INTO article (title, content) VALUES
('First Article', 'This is the content of the first article.'),
('Second Article', 'This is the content of the second article.'),
('Third Article', 'This is the content of the third article.');

SELECT * FROM article;
```

---

### Debugging

- In the Browser: use the CodeIgniter Debugging toolbar to inspect queries and see variables passed to the view.
- use the `log_message('info', 'Your debug message here');` function to log messages to the log files located in `writable/logs/`.
- use `dd($variable);` to dump and die, which is useful for inspecting variables during development.
   


