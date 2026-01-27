# Section 6: Entity Classes: Editing and Deleting Existing Records

References:
- https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39185700#questions/21754430
  
CodeIgniter Documentation:
- https://codeigniter4.github.io/shield/customization/#custom-validation-rules
- https://codeigniter4.github.io/shield/concepts/#password-validators
- https://codeigniter4.github.io/shield/quickstart/#responding-to-magic-link-logins
 
---

### Run migrations 
NOTE: use `-all` if reinstalling everything on another machine

```bash
cd /Users/macbookpro/dev/php/github/php/codeigniter-4/hollingworth/09-customize-shield/ci-app/
sudo php spark migrate 
```

## Move to the project directory and regenerate the vendor folder
```bash
cd codeigniter-4/hollingworth/05-validation/ci-app
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
**NOTE:**: on macOS use "**Bash**", not the default "Zsh" terminal shell, as `cp -R` behaves differently in Zsh (omits the hidden files like `.env`).
- Set origin folder:
  ```bash
  origin_dir="/Users/macbookpro/dev/php/github/php/codeigniter-4/hollingworth/09-customize-shield/ci-app/"
  ```

- Copy the contents of the `ci-app` folder to the `deployment/ci-app` folder:
  ```bash
  dest_dir="/Users/macbookpro/dev/php/github/php/codeigniter-4/hollingworth/deployment/ci-app"
  sudo cp -R $origin_dir $dest_dir
  ```



