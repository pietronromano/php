# Section 4: Displaying and Inserting Database Data

References:
- udemy.com/course/codeigniter-from-scratch/learn/lecture/39182568#overview
- https://watercss.kognise.dev/
  
CodeIgniter Documentation:
- https://codeigniter.com/user_guide/incoming/routing.html#placeholders
- https://codeigniter.com/user_guide/models/model.html#working-with-data
- https://codeigniter.com/user_guide/helpers/url_helper.html#site_url
- https://codeigniter.com/user_guide/incoming/routing.html#reverse-routing
- https://codeigniter.com/user_guide/helpers/form_helper.html
- https://watercss.kognise.dev/
- https://codeigniter.com/user_guide/models/model.html#saving-data
- https://codeigniter.com/user_guide/models/model.html#allowedfields

---
 
## Move to the project directory and regenerate the vendor folder
```bash
cd codeigniter-4/hollingworth/04-db-display-insert/ci-app
composer install

``` 

## Run the built-in PHP Server
- In the terminal, navigate to the `ci-app` directory if you're not already there:
- Start the built-in PHP server:
```bash
php spark serve
```

- Open your web browser and navigate to `http://localhost:8080/articles` to see the CodeIgniter articles page.

- Stop the server by pressing `CTRL + C` in the terminal when you're done.

---

## MacOS with Apache
### Copy files to the deployment folder
**NOTE:**: on macOS use "**Bash**", not the default "Zsh" terminal shell, as `cp -R` behaves differently in Zsh (omits the hidden files lie `.env`).
- Set origin folder:
  ```bash
  origin_dir="/Users/macbookpro/dev/php/github/php/codeigniter-4/hollingworth/04-display-insert/ci-app/"
  ```

- Copy the contents of the `ci-app` folder to the `deployment/ci-app` folder:
  ```bash
  dest_dir="/Users/macbookpro/dev/php/github/php/codeigniter-4/hollingworth/deployment/ci-app"
  sudo cp -R $origin_dir $dest_dir
  ```



