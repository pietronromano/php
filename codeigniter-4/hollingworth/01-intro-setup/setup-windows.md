# Windows Setup 

## Regenerating
After cloning from GitHub, We need to regenerate the `vendor`folder again (similar to node_modules in nodejs): otherwise we will get an error indicating that this folder is missing.

- In the terminal, navigate to the `ci-app` directory if you're not already there:
    ```bash
    cd codeigniter-4/hollingworth/01-intro-setup/ci-app
    ```
---

After that, we have two options:
- Option 1: Run with the built-in PHP Server
- Option 2: Run with Laragon/Apache


## Option 1: Run with the built-in PHP Server

### Configure the project with the .env file
- Open the `.env` file
  - Set the environment `app.baseURL`
    ...
    app.baseURL = 'http://localhost:8080/ '
    ```
- Save the file.


### Run the app
- In the terminal, navigate to the `ci-app` directory if you're not already there:
- Start the built-in PHP server:
    ```bash
    cd codeigniter-4/hollingworth/01-intro-setup/ci-app
    php spark serve
    ```
- Open your web browser and navigate to `http://localhost:8080` to see the CodeIgniter welcome page.
- NOTE: Browsing works, even if terminal shows these sorts of messages: "[::1]:59760 Closing"

- Stop the server by pressing `CTRL + C` in the terminal when you're done.

---

## Option 2: Run with Laragon/Apache
### Create www project root
- In VS Code, open a Git Bash terminal
- Create  your project root: 
  ```bash
  cd /c/laragon/www
  mkdir ci-app
  ```
- In Laragon UI, Right Click -> www -> ci-app: the url shows
  - http://ci-app.test:8080/ -> opens automatically
  - http://ci-app.localhost:8080/ -> will also work (so same as on MacOS)

---


### Configure the project with the .env file
- Open the `.env` file
  - Set app.baseURL to match your Apache setup
    ```
    CI_ENVIRONMENT = development
    ...
    app.baseURL = 'http://ci-app.localhost:8080/ '
    ```
- Save the file.

---
 
### Create Deployment & Writable folders
We can use the same deployment folder for different versions of our project to be served by Apache: this avoids having to reconfigure Apache Virtual Hosts each time we switch versions of the project.

```bash
deployment_dir="/c/laragon/www/ci-app"
mkdir $deployment_dir
mkdir $deployment_dir/writable
mkdir $deployment_dir/writable/cache
mkdir $deployment_dir/writable/logs
``` 

In the `app/Config/Paths.php` file, set the writable directory path to point to this new `writable` folder:
```php
public string $writableDirectory = '/c/laragon/www/ci-app/writable';
```

### Copy files to the deployment folder
- Set origin folder:
  ```bash
  origin_dir="/c/dev/php/php/codeigniter-4/hollingworth/01-intro-setup/ci-app"
  ```

- Copy the contents of the `ci-app/*` folder to the `www/ci-app` folder:
  ```bash
  cp -R $origin_dir/* "/c/laragon/www/ci-app/"
  ```

---

## Configure Apache Virtual Host
With a Laragon installation:
- the `httpd.conf` file is stored in:
    - C:\laragon\bin\apache\httpd-2.4.62-240904-win64-VS17\conf

- The `httpd-vhosts.conf` file is store in:
    - C:\laragon\bin\apache\httpd-2.4.62-240904-win64-VS17\conf\extra


### The `httpd.conf` file
- Open the virtual hosts file 
```bash
code "C:\laragon\bin\apache\httpd-2.4.62-240904-win64-VS17\conf\httpd.conf"
```

- Change the listening port from 80 to 8080
    ```
    Listen 8080
    ```

- Uncomment the include for virtual hosts by removing the `#` at the beginning of the line:
    ```
    # Virtual hosts
    Include conf/extra/httpd-vhosts.conf
    ```

- The `ServerName` directive is pre-set by Laragon to Laragon itself

### Modules
NOTE: with Laragon installation, the php module isn't installed... so **no need
for this** (it will give an error anyway):
    ```conf
    LoadModule php_module /opt/homebrew/opt/php@8.5/lib/httpd/modules/libphp.so
    <IfModule php_module>
        <FilesMatch \.php$>
            SetHandler application/x-httpd-php
        </FilesMatch>
    </IfModule>
    ```
 
Uncomment if not done already
```conf
LoadModule rewrite_module modules/mod_rewrite.so
```

If getting *"AH01276: Cannot serve directory error"*: this means Apache successfully accessed the directory, but couldn't find an index file to serve and directory listing is disabled.
- Update the DirectoryIndex to include `index.php`. Find the line that starts with `DirectoryIndex` and change add `index.php` like so:
```    
DirectoryIndex index.php index.html
```

---

### Edit the virtual hosts file 
```bash
code C:/laragon/bin/apache/httpd-2.4.62-240904-win64-VS17/conf/extra/httpd-vhosts.conf
```

- Add the following configuration to the file:
- NOTE: `DocumentRoot` must point to the `public` folder inside the `ci-app` directory, the same applies to the `<Directory>` directive.
    ```apache
    <VirtualHost *:8080>
        DocumentRoot "C:\laragon\www\ci-app\public"
        ServerName   ci-app.localhost
        ErrorLog     "C:\laragon\www\ci-app\writable\logs\error_log"
        CustomLog    "C:\laragon\www\ci-app\writable\logs\access_log" common

        <Directory "C:\laragon\www\ci-app\public">
            AllowOverride All
            Require all granted
        </Directory>
 </VirtualHost>
    ```
 

Restart Apache to apply the changes:

- Check Error Logs
Look at the error log for specific details:
```bash
code "C:\laragon\www\ci-app\writable\logs\error_log"
```

Or check the main Apache error log:
```bash
code C:\laragon\bin\apache\httpd-2.4.62-240904-win64-VS17\logs\error_log
```

---

### Access the Application
In Browser, navigate to:
- http://ciapp.localhost
- http://localhost.ciapp

To verify that we're seeing the right pages, change the CodeIgniter welcome message in `app/Views/welcome_message.php` and refresh the browser.

---

### Install using XAMPP
  1. Download and install XAMPP from https://www.apachefriends.org/index.html
  2. Start the Apache server using the XAMPP Control Panel.
  3. Default Apache web root directory in XAMPP: `C:\xampp\htdocs`
  4. Default Apache configuration file in XAMPP: `C:\xampp\apache\conf\httpd.conf`


See the lesson for details: https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39182242#overview



