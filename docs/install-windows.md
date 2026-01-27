# Install PHP Windows
References:
- Brad Traversy: https://www.udemy.com/course/php-from-scratch-course/learn/lecture/41057064#overview

## Laragon
`Laragon` is a more *modern* solution than XAMPP and WAMP. It includes Apache, MySQL, PHP, Cmder (a third-party bash terminal) and more in a lightweight package:
- Apache 2.4, Nginx, MySQL 9.4/8.4, PHP 8.4/8.3/8.2/8.1, Node.js 24/23/22, Python 3.13, Redis, Memcached, PostgreSQL 18/17/16/15, npm, git, Composer...

Install via `Laragon` on Windows:
1. Download and install Laragon from https://laragon.org/download/
   - NOTE: For managing license, go to https://app.lemonsqueezy.com/my-orders/login
2. During installation, select PHP as one of the components.
3. After installation, start Laragon and use the built-in terminal to run PHP commands.

    ![laragon](images/laragon-setup.png)
    ![laragon](images/laragon-config.png)

4. You can add tools by right-clicking the dialog:

    ![laragon](images/laragon-tools.png)

5. Install **PHP 8.4**
   - Tools -> Quick add -> PHP 8.4


### Default Laragon Page
After installing Laragon, if you navigate to http://localhost, this the default page:
    ![laragon](images/laragon-defaultpage.png)

You can change the default port from within the Laragon UI:

**NOTE**: It often takes several restarts / reloads for Apache to update and to get the new port to work.

---

### Add Laragon to Windows Path
In order to be able to run PHP from any terminal, not just the Laragon Cmnder terminal, we need to add the Laragon installation to our path:
    ![laragon](./laragon-path.png)

The results can be seen from the Path menu, and also by searching windows for "Environment Variables":
       ![laragon](./laragon-path-env.png)

---


### Creating Virtual Hosts with Laragon
- Apache default root is `c:\laragon\www` (can be changed from Laragon UI)
- Create a sub-folder `test-app`
- Restart Apache (will get a message "App making changes - Virtual host") 
- Can now access on:
    - http://localhost/test-app
    - http://test-app.test


---

### Install MySQL and phpMyAdmin
In the Laragon UI, activate MySQL.

NOTE: the default user is `root` with a blank password: changing that is **risky** as if it goes wrong, we have to reinstall Laragon.

You can then click on the `Database` button to open **HeidiSQL**:
- Click on the users icon to add users (pietronromano|alex) to the db: pietronromano|alex
- In Cmnder, login with the -p option to be prompted for a password:
   ```bash
   mysql -u pietronromano|alex -p
   ```
   - You will be prompted for the pwd


#### Install phpMyAdmin
Go to Tools -> Quick add -> phpmyadmin-6.0snapshot
    ![laragon](images/laragon-phpmyadmin.png)

After that, the MyAdmin UI is available via web on localhost:[port]:
- http://localhost:8080/phpmyadmin6/public/index.php?route=/



---

### Install just PHP on Windows:
1. Download the latest PHP version from the official website: https://windows.php.net/download/
2. Extract the downloaded ZIP file to a directory of your choice (e.g., `C:\php`).
3. Add the PHP directory to your system's PATH environment variable.
4. Verify the installation by opening Command Prompt and running:
   ```cmd
   php -v
   ```
---


## Composer - PHP Dependency Manager
**NOTE**: Laragon already has Composer incorporated - run it from the Laragon integrated Command line: Cmder


(Taken from Unlock PHP 8: see in this repo: unlock-php8/Composer.md )

[]: # Path: ComposerWindows.md
### Install composer with windows
- Download the installer from the [official website](https://getcomposer.org/download/)
- Run the installer
- Check the installation
```bash
composer
```

---

## VS Code Extensions for PHP
- **PHP Intelephense**: Provides advanced PHP language features like code completion, linting, and more.
- **PHP Debug**: Adds support for debugging PHP code using Xdebug:
   - SEE below for detailed instructions on installing Xdebug on Windows.
- **PHP DocBlocker**: Helps in generating PHPDoc comments for your functions and classes.
   - Usage: Type `/**` above a function or class and press Enter to auto-generate a DocBlock.
- **PHP Namespace Resolver**: Assists in managing and importing PHP namespaces.

---


## Debugging

### Install Xdebug
References: 
- https://xdebug.org/docs/install 
- Mostly ok: https://pen-y-fan.github.io/2021/08/03/How-to-Set-up-VS-Code-to-use-PHP-with-Xdebug-3-on-Windows/

*MY* specific steps:
- Go to https://xdebug.org/download, download the correct php version (e.g. 8.4, **nts**)
- Confirm/allow the download in the Browser if it doesn't complete automatically
- Copy the dll (php_xdebug-3.5.0-8.4...) to c:\laragon\php\php-8.4....\ext (Tip: Use Laragon to open this folder using: Menu > PHP > dir:ext)
- Next add Xdebug configuration to php.ini:
   - Laragon Menu > PHP > php.ini
   - Wait for php.ini to open with Notepad++, scroll to the bottom of the file and add the exact name of the .dll:
   ```ini
      [xdebug]
      zend_extension="php_xdebug-3.5.0-8.4-nts-vs17-x86_64.dll"
      xdebug.mode=coverage,debug,develop
      xdebug.start_with_request=yes
      xdebug.client_port=9003
   ```

- Back in Laragon, verify xdebug is activated by either of these methods:
   - The Xdebug extension: Menu > PHP > Quick settings > ☑ xdebug (note it wouldn't let me check/uncheck this )
   - the Cmder terminal:
      ```bash
      λ php -v
      PHP 8.4.12 (cli) (built: Aug 26 2025 18:01:53) (NTS Visual C++ 2022 x64)
      Copyright (c) The PHP Group
      Zend Engine v4.4.12, Copyright (c) Zend Technologies
         with Xdebug v3.5.0, Copyright (c) 2002-2025, by Derick Rethans
      ```
- In VS Code, go to Settings: set the `php.debug.executablePath` value to the location of the php.exe file
    "php.debug.executablePath": "C:\\laragon\\bin\\php\\php-8.4.12-nts-Win32-vs17-x64\\php.exe"

---

### VS Code Debugging Steps
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





