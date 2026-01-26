# Section 4: Displaying and Inserting Database Data

References:
- udemy.com/course/codeigniter-from-scratch/learn/lecture/39182568#overview
- https://watercss.kognise.dev/
  
CodeIgniter Documentation:
- https://codeigniter.com/user_guide/models/model.html#allowedfields
- https://codeigniter.com/user_guide/models/model.html#saving-data
- https://codeigniter.com/user_guide/incoming/incomingrequest.html#retrieving-input
- https://codeigniter.com/user_guide/helpers/form_helper.html
- https://codeigniter.com/user_guide/incoming/routing.html#reverse-routing
- https://codeigniter.com/user_guide/helpers/url_helper.html#site_url
- https://codeigniter.com/user_guide/models/model.html#working-with-data

---
 
## Move to the project directory
```bash
cd codeigniter/04-db-display-insert/ci-app

``` 

## Run the built-in PHP Server
- In the terminal, navigate to the `ci-app` directory if you're not already there:
- Start the built-in PHP server:
    ```bash
    php spark serve
    ```
  - Open your web browser and navigate to `http://localhost:8080` to see the CodeIgniter welcome page.

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

```

---


References:
- https://codeigniter.com/user_guide/incoming/routing.html#placeholders
- https://codeigniter.com/user_guide/models/model.html#working-with-data
- https://codeigniter.com/user_guide/helpers/url_helper.html#site_url
- https://codeigniter.com/user_guide/incoming/routing.html#reverse-routing
- https://codeigniter.com/user_guide/helpers/form_helper.html
- https://watercss.kognise.dev/
- https://codeigniter.com/user_guide/models/model.html#saving-data
- https://codeigniter.com/user_guide/models/model.html#allowedfields


