# Section 6: Entity Classes: Editing and Deleting Existing Records

References:
- https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39185532#overview
  
CodeIgniter Documentation:
- https://codeigniter.com/user_guide/general/common_functions.html#old
- https://codeigniter.com/user_guide/models/entities.html
- https://codeigniter.com/user_guide/models/entities.html#filling-properties-quickly
- https://codeigniter.com/user_guide/models/entities.html#checking-for-changed-attributes
- https://codeigniter.com/user_guide/general/errors.html#pagenotfoundexception
- https://codeigniter.com/user_guide/incoming/incomingrequest.html#is
- https://codeigniter.com/user_guide/general/common_functions.html#esc
 
---

## Move to the project directory and regenerate the vendor folder
```bash
cd codeigniter-4/hollingworth/06-entity-classes/ci-app
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
  origin_dir="/Users/macbookpro/dev/php/github/php/codeigniter-4/hollingworth/06-entity-classes/ci-app/"
  ```

- Copy the contents of the `ci-app` folder to the `deployment/ci-app` folder:
  ```bash
  dest_dir="/Users/macbookpro/dev/php/github/php/codeigniter-4/hollingworth/deployment/ci-app"
  sudo cp -R $origin_dir $dest_dir
  ```



