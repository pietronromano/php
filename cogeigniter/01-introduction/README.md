# 01-Introduction

References:
- https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39182226#overview
- https://codeigniter.com/user_guide/installation/running.html#local-development-server

---

## Install CodeIgniter for our `ci-app` project using Composer
```bash
cd cogeigniter/01-introduction
composer create-project codeigniter4/appstarter ci-app
cd ci-app
``` 

## Configure the project with the .env file
- Rename `env` file to `.env`
    ```bash
    mv env .env
    ```
- Open the `.env` file
  - Set the environment to `development`
  - Set app.baseURL to match your Apache setup
    ```
    CI_ENVIRONMENT = development
    ...
    app.baseURL = 'http://ciapp01.localhost:8080/'
    ```
- Save the file.

---

## Configure the Web Server
### Built-in PHP Server
- In the terminal, navigate to the `ci-app` directory if you're not already there:
- Start the built-in PHP server:
    ```bash
    php spark serve
    ```
  - Open your web browser and navigate to `http://localhost:8080` to see the CodeIgniter welcome page.

- Stop the server by pressing `CTRL + C` in the terminal when you're done.

### Apache
[**OPTIONAL, BUT USED HERE**] You can also configure a local web server Apache to serve the `ci-app` project.
- See [Uber readme](../README.md ) for Apache installation details.
- See the lesson for details: https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39182242#overview

#### Configure Apache Virtual Host:
NOTE! On MacOS with Homebrew Apache (took me a *while* to find this out), the file is located at:
- `/opt/homebrew/etc/httpd/httpd.conf`
  
NOTE:
- To see hidden file folders in Finder, use `CMD + SHIFT + . `
- httpd.conf **didn't show** in Finder search results

- Uncomment the include for virtual hosts by removing the `#` at the beginning of the line:
```
# Virtual hosts
Include /opt/homebrew/etc/httpd/extra/httpd-vhosts.conf
```

- Set the `ServerName` directive to avoid warnings. Find the line that starts with `#ServerName` and change it to:
```
# If your host doesn't have a registered DNS name, enter its IP address here.
ServerName ciapp0.localhost:8080
```

- If using PHP with Apache, ensure the PHP module is loaded. Otherwise, Apache won't be able to process PHP files and will serve them as plain text.
- Find and uncomment (or add) the following line:
```
LoadModule php_module /opt/homebrew/opt/php@8.5/lib/httpd/modules/libphp.so
<IfModule php_module>
    <FilesMatch \.php$>
        SetHandler application/x-httpd-php
    </FilesMatch>
</IfModule>
```

- "AH01276: Cannot serve directory error": means Apache successfully accessed the directory, but couldn't find an index file to serve and directory listing is disabled.
- Update the DirectoryIndex to include `index.php`. Find the line that starts with `DirectoryIndex` and change it to:
```    DirectoryIndex index.php index.html
---

Edit the virtual hosts file located at: `/opt/homebrew/etc/httpd/extra/httpd-vhosts.conf`
- Create a `logs` folder inside the `ci-app` directory to store log files:
```bash
mkdir /Users/macbookpro/dev/php/github/php/cogeigniter/01-introduction/ci-app/logs
``` 

- Add the following configuration to the file:
```apache
<VirtualHost *:8080>
    DocumentRoot "/Users/macbookpro/dev/php/github/php/cogeigniter/01-introduction/ci-app/public"
    ServerName   ciapp01.localhost:8080
    ErrorLog     "/Users/macbookpro/dev/php/github/php/cogeigniter/01-introduction/ci-app/logs/error_log"
    CustomLog    "/Users/macbookpro/dev/php/github/php/cogeigniter/01-introduction/ci-app/logs/access_log" common

    <Directory "/Users/macbookpro/dev/php/github/php/cogeigniter/01-introduction/ci-app/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

Restart Apache to apply the changes:
```bash
sudo apachectl restart
```

5. Verify PHP is loaded:
```bash
httpd -M | grep php
```
You should see php_module in the output.


- Check Apache Error Logs
Look at the error log for specific details:
```bash
tail -f /Users/macbookpro/dev/php/github/php/cogeigniter/01-introduction/ci-app/logs/error_log
```

Or check the main Apache error log:
```bash
tail -f /opt/homebrew/var/log/httpd/error_log
```

### Set Permissions for the `writable` directory
Avoid "CodeIgniter\Cache\Exceptions\CacheException Cache unable to write to" errors by setting the correct permissions for the `writable` directory:
```bash
writable_dir="/Users/macbookpro/dev/php/github/php/cogeigniter/01-introduction/ci-app/writable/"
sudo chmod -R 755 $writable_dir 
sudo chown -R _www:_www $writable_dir 
```

### Access the Application
In Browser, navigate to `http://ciapp01.local:8080` to see the CodeIgniter welcome page.    




