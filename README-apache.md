
# Apache Web Server 
References:
- Brad's Cheatsheet: https://www.devsheets.io/sheets/apache

## Install Apache on MacOS
```bash
brew install httpd
```
- Start Apache server
```bash
sudo apachectl start
```
- Stop Apache server
```bash
sudo apachectl stop
```
- Restart Apache server
```bash
sudo apachectl restart
```

- Test Apache Configuration
```bash
apachectl configtest
```

NOTE! On MacOS with Homebrew Apache (took me a *while* to find this out), the `.conf` file is located at: 
```bash
code /opt/homebrew/etc/httpd/httpd.conf
```
NOTE: to see hidden file folders in MacOS Finder, use `CMD + SHIFT + . `

ApacheDefaults:
- Default Apache web root directory on MacOS: `/usr/local/var/www`
- Default Apache configuration file on MacOS: `/usr/local/etc/httpd/httpd.conf`
- For more details, refer to the official Apache documentation: https://httpd.apache.org/docs/


## Install Apache on Windows using XAMPP:
  1. Download and install XAMPP from https://www.apachefriends.org/index.html
  2. Start the Apache server using the XAMPP Control Panel.
  3. Default Apache web root directory in XAMPP: `C:\xampp\htdocs`
  4. Default Apache configuration file in XAMPP: `C:\xampp\apache\conf\httpd.conf`

---

## Setup CodeIgniter 4 with Apache Web Server

You can also configure a local web server Apache to serve your [myapp] project.
- See [Uber readme](../README.md ) for initial Apache installation details.
- See the lesson for details: https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39182242#overview

### Configure Apache Virtual Host:

NOTE:
- To see hidden file folders in Finder, use `CMD + SHIFT + . `
- httpd.conf **didn't show** in Finder search results

NOTE! On MacOS with Homebrew Apache (took me a *while* to find this out). 
Edit the Apache configuration file:
```bash
code /opt/homebrew/etc/httpd/httpd.conf
```
  
- Uncomment the include for virtual hosts by removing the `#` at the beginning of the line:
    ```
    # Virtual hosts
    Include /opt/homebrew/etc/httpd/extra/httpd-vhosts.conf
    ```

- Set the `ServerName` directive to avoid warnings. Find the line that starts with `#ServerName` and change it to:
    ```
    # If your host doesn't have a registered DNS name, enter its IP address here.
    ServerName [myapp].localhost
    ```

When using PHP with Apache, ensure the PHP module is loaded. Otherwise, Apache won't be able to process PHP files and will serve them as plain text.
Find and uncomment (or add) the following lines:
- `php_module`: to allow Apache to process PHP files
- `mod_rewrite`: to enable URL rewriting, which is essential for CodeIgniter's routing to work correctly (otherwise, you will encounter 404 errors when trying to access routes defined in CodeIgniter).
```
LoadModule php_module /opt/homebrew/opt/php@8.5/lib/httpd/modules/libphp.so
<IfModule php_module>
    <FilesMatch \.php$>
        SetHandler application/x-httpd-php
    </FilesMatch>
</IfModule>

LoadModule rewrite_module lib/httpd/modules/mod_rewrite.so

```

If getting *"AH01276: Cannot serve directory error"*: this means Apache successfully accessed the directory, but couldn't find an index file to serve and directory listing is disabled.
- Update the DirectoryIndex to include `index.php`. Find the line that starts with `DirectoryIndex` and change add `index.php` like so:
```    
DirectoryIndex index.php index.html
```


- Edit the virtual hosts file: 
```bash
code /opt/homebrew/etc/httpd/extra/httpd-vhosts.conf
```

- Add the following configuration to the file:
- NOTE: `DocumentRoot` must point to the `public` folder inside the `[myapp]` directory, the same applies to the `<Directory>` directive.
    ```apache
    <VirtualHost *:8080>
        DocumentRoot "/Users/macbookpro/dev/php/github/php/cogeigniter/deployment/[myapp]/"
        ServerName   [myapp].localhost
        ErrorLog     "/Users/macbookpro/dev/php/github/php/cogeigniter/deployment/logs/error_log"
        CustomLog    "/Users/macbookpro/dev/php/github/php/cogeigniter/deployment/logs/access_log" common

        <Directory "/Users/macbookpro/dev/php/github/php/cogeigniter/deployment/[myapp]/public">
            AllowOverride All
            Require all granted
        </Directory>
    </VirtualHost>
    ```

Restart Apache to apply the changes:
```bash
sudo apachectl restart
```

1. Verify PHP is loaded:
```bash
httpd -M | grep php
```
You should see `php_module` in the output.


- Check Apache Error Logs
Look at the error log for specific details:
```bash
tail -f /Users/macbookpro/dev/php/github/php/cogeigniter/deployment/logs/error_log
```

Or check the main Apache error log:
```bash
tail -f /opt/homebrew/var/log/httpd/error_log
```

---

### Access the Application
In Browser, navigate to `http://[myapp].localhost:8080` to see the app start page.    



