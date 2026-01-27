# Install PHP MacOS
References:
- Brad Traversy: https://www.udemy.com/course/php-from-scratch-course/learn/lecture/41057058#overview
- https://formulae.brew.sh/formula/php#default

1. Install Homebrew if you haven't already:
   ```bash
   /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
   ```
2. Install PHP using Homebrew: On MacOs, it includes a built-in http server:
   ```bash
   brew install php
   ```
3. Verify the installation:
   ```bash
   php -v
   ``` 

4. Run a PHP file directly from the terminal:
   ```bash
   php yourfile.php
   ```

5. Run a local development server:
   ```bash
   php -S localhost:8000
   ```
   Then open your browser and navigate to `http://localhost:8000`.


6. [OPTIONAL] To start php now and restart at login:
```bash
  brew services start php
```

7. [OPTIONAL] To stop php:
```bash
  brew services stop php
```

---


## Apache Web Server on MacOS 
References:
- Brad's Cheatsheet: https://www.devsheets.io/sheets/apache

## Install Apache 
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


---

## VS Code Extensions for PHP
- **PHP Intelephense**: Provides advanced PHP language features like code completion, linting, and more.
- **PHP Debug**: Adds support for debugging PHP code using Xdebug.
- **PHP DocBlocker**: Helps in generating PHPDoc comments for your functions and classes.
   - Usage: Type `/**` above a function or class and press Enter to auto-generate a DocBlock.
- **PHP Namespace Resolver**: Assists in managing and importing PHP namespaces.

---

## How to Debug PHP in VS Code on macOS
References:
- https://marketplace.visualstudio.com/items?itemName=xdebug.php-debug


### Install Xdebug:

```bash
pecl install xdebug
```

### Configure php.ini:
Find your php.ini location:
```bash
php --ini

```

cd to that directory and open `php.ini` in a text editor
```bash
cd /opt/homebrew/etc/php/8.5
nano php.ini
```

Add Xdebug configuration:
   ```ini
   [xdebug]
   zend_extension="xdebug.so"
   xdebug.mode=debug
   xdebug.start_with_request=yes
   xdebug.client_port=9003
   ```

### Install PHP Debug Extension

In VS Code:
- Open Extensions (⌘+Shift+X)
- Search "PHP Debug" by Xdebug
- Install it

### Create launch.json

Press ⌘+Shift+D, click "create a launch.json file", select PHP:
```json
{
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "port": 9003
        }
    ]
}
```

### Start Debugging

### Generic Debugging Steps
1. Right click on the directory of your PHP file -> "Copy Relative Path"
2. In VS Code terminal, CD to that directory
3. Open the PHP file you want to debug.
4. Set breakpoints by clicking left of line numbers.

#### Debugging a script file
1. In top right of VS Code, Select the Debug Icon (play button with bug) -> "**Debug PHP File**"
   The debugger will pause at breakpoints, allowing you to inspect variables, step through code

#### Server-side Debugging
1. Click the VS Code Debug Icon (play button with bug)
2. Select "**Listen for Xdebug**"
3. Set breakpoints by clicking left of line numbers
4. In the terminal, start your PHP server (`php -S localhost:8000`)
5. Open your browser and navigate to (or refresh if already open) `localhost:8000/yourpage.php`: 
   The debugger will pause at breakpoints, allowing you to inspect variables, step through code

---


## Composer - PHP Dependency Manager
(Taken from Unlock PHP 8: see in this repo: unlock-php8/Composer.md )

[]: # Path: ComposerMac.md
### Install composer with mac
- Download the installer to the current directory
```bash
curl -sS https://getcomposer.org/installer | php
```

- Move composer to the bin directory
```bash
sudo mv composer.phar /usr/local/bin/composer
```

- Make composer executable
```bash
sudo chmod +x /usr/local/bin/composer
```

- Check the installation
```bash
composer
```


