# Section 6: Entity Classes: Editing and Deleting Existing Records

References:
- https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39185626#overview
  
CodeIgniter Documentation:
- Method spoofing:https://codeigniter4.github.io/CodeIgniter4/incoming/methodspoofing.html
- https://simple.wikipedia.org/wiki/Representational_state_transfer
- https://codeigniter.com/user_guide/incoming/routing.html#uri-segments
- https://codeigniter.com/user_guide/incoming/restful.html#resource-routes
- https://medium.com/@shubhangirajagrawal/the-7-restful-routes-a8e84201f206
 
---
 
## Listing Routes
To see all routes (use sudo if don't have permissions on the writable folder):
```bash
cd codeigniter-4/hollingworth/07-autorouting-rest/ci-app
sudo php spark routes
```
This will show the list of defined routes, including named routes.
Routes can also be seen in the CodeIgniter web interface tool

## HTTP Method Spoofing
Browsers only support GET and POST methods in forms. To use other HTTP methods like DELETE or PUT, we can use method spoofing in CodeIgniter. This is done by adding a hidden input field in the form with the name `_method` and the value set to the desired HTTP method (e.g., DELETE).
NOTE: The value must be in CAPITALS to work.
SEE: https://codeigniter.com/user_guide/incoming/methodspoofing.html

## Move to the project directory and regenerate the vendor folder
```bash
cd codeigniter-4/hollingworth/07-autorouting-rest/ci-app
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
  origin_dir="/Users/macbookpro/dev/php/github/php/codeigniter-4/hollingworth/07-autorouting-rest/ci-app/"
  ```

- Copy the contents of the `ci-app` folder to the `deployment/ci-app` folder:
  ```bash
  dest_dir="/Users/macbookpro/dev/php/github/php/codeigniter-4/hollingworth/deployment/ci-app"
  sudo cp -R $origin_dir $dest_dir
  ```



