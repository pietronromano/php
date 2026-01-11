# php
Uber repo for PHP examples and courses

**References**:
- PHP Manual: https://www.php.net/manual
- Brad's Cheatsheet: https://www.devsheets.io/php
- W3Techs - World Wide Web Technology Surveys: https://w3techs.com/ : 
  - PHP is used by 72.4% of all websites in December 2025
- Composer (dependency manager): https://getcomposer.org/download/
  - (See Composer section below)


**My Kindle books**:
- Mastering PHP Programming: A Comprehensive   Guide for BCA MCA and  Professionals VOL-I, by Mishra, Anshuman. 
- Unlock PHP 8 From Basic to Advanced, Sommerfeld, Roni. 

---

## How to setup PHP environment

### MacOS
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

### Windows
References:
- Brad Traversy: https://www.udemy.com/course/php-from-scratch-course/learn/lecture/41057064#overview

`Laragon` is a more modern solution than XAMPP and WAMP.

Install via `Laragon` on Windows:
1. Download and install Laragon from https://laragon.org/download/
2. During installation, select PHP as one of the components.
3. After installation, start Laragon and use the built-in terminal to run PHP commands.


Install just PHP on Windows:
1. Download the latest PHP version from the official website: https://windows.php.net/download/
2. Extract the downloaded ZIP file to a directory of your choice (e.g., `C:\php`).
3. Add the PHP directory to your system's PATH environment variable.
4. Verify the installation by opening Command Prompt and running:
   ```cmd
   php -v
   ```
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

### Add Xdebug configuration:
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

#### Debugging a script file
1. Open the PHP file you want to debug.
2. Set breakpoints by clicking left of line numbers.
3. In top right of VS Code, Select the Debug Icon (play button with bug) -> "Debug PHP File"
4. The debugger will pause at breakpoints, allowing you to inspect variables, step through code



#### Server-side Debugging

1. Set breakpoints by clicking left of line numbers
2. Start your PHP server (`php -S localhost:8000`)
3. Press F5 or click "Start Debugging"
4. Access your PHP page in browser

The debugger will pause at breakpoints, allowing you to inspect variables, step through code, and evaluate expressions.

---

## Composer - PHP Dependency Manager
(Taken from Unlock PHP 8: see in this repo: unlock-php8/Composer.md )
### Install composer with linux
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

[]: # Path: ComposerWindows.md
### Install composer with windows
- Download the installer from the [official website](https://getcomposer.org/download/)
- Run the installer
- Check the installation
```bash
composer
```

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

