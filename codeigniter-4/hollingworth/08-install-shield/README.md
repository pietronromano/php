# Section 6: Entity Classes: Editing and Deleting Existing Records

References:
- https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39185664#questions/21754430
  
CodeIgniter Documentation:
- https://codeigniter.com/user_guide/libraries/official_packages.html#shield
- https://codeigniter4.github.io/shield/authentication/#auth-helper
- https://codeigniter.com/user_guide/libraries/email.html
- https://codeigniter4.github.io/shield/quickstart/#enable-account-activation-via-email
 
---
 
## Install Shield Authentication Library
```bash
cd codeigniter-4/hollingworth/08-install-shield/ci-app
composer require codeigniter4/shield
```

### Setup
This adds and updates the necessary configuration files, and runs the migrations to create the required database tables (`auth_*`, `settings`).
May need sudo if need permissions to write to writable/cache/
```bash
sudo php spark shield:setup

# Output:
CodeIgniter v4.6.4 Command Line Tool - Server Time: 2026-01-21 06:53:33 UTC+00:00

  Created: APPPATH/Config/Auth.php
  Created: APPPATH/Config/AuthGroups.php
  Created: APPPATH/Config/AuthToken.php
  Updated: APPPATH/Config/Autoload.php
  Updated: APPPATH/Config/Routes.php
  Updated: We have updated file 'APPPATH/Config/Security.php' for security reasons.
  The required Config\Email::$fromEmail is not set. Do you set now? [y, n]: y
  What is your email? : pietronromano@live.com
  The required Config\Email::$fromName is not set. Do you set now? [y, n]: y
  What is your name? : Pietro
  Updated: APPPATH/Config/Email.php
  Run `spark migrate --all` now? [y, n]: y
Running all new migrations...
        Running: (CodeIgniter\Shield) 2020-12-28-223112_CodeIgniter\Shield\Database\Migrations\CreateAuthTables
        Running: (CodeIgniter\Settings) 2021-07-04-041948_CodeIgniter\Settings\Database\Migrations\CreateSettingsTable
        Running: (CodeIgniter\Settings) 2021-11-14-143905_CodeIgniter\Settings\Database\Migrations\AddContextColumn
Migrations complete.
```

### Update Routes.php
Add the following line to `app/Config/Routes.php` to enable the Shield auth routes:
```php
//Auth routes for shield
service('auth')->routes($routes);
```

Now we can navigate to `/register` to create a new user, and then to `/login` to log in.

---

### Emails
NOTE: haven't configured emails: so will get an exception when creating a user or logging in
```.env
# EMAIL: NOTE: You need to set up a real SMTP server to send emails.
# email.SMTPHost = smtp.example.com
# email.SMTPUser = user@example.com
# email.SMTPPass = your-password
# email.SMTPPort = 587
```

## Move to the project directory and regenerate the vendor folder
```bash
cd codeigniter-4/hollingworth/08-install-shield/ci-app
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
  origin_dir="/Users/macbookpro/dev/php/github/php/codeigniter-4/hollingworth/08-install-shield/ci-app/"
  ```

- Copy the contents of the `ci-app` folder to the `deployment/ci-app` folder:
  ```bash
  dest_dir="/Users/macbookpro/dev/php/github/php/codeigniter-4/hollingworth/deployment/ci-app"
  sudo cp -R $origin_dir $dest_dir
  ```



