# Section 1: Introduction and Setup

References:
- https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39182226#overview

CodeIgniter Documentation:
- https://codeigniter.com/user_guide/installation/running.html#local-development-server
- https://codeigniter.com/
- https://codeigniter.com/user_guide/index.html
- https://codeigniter.com/user_guide/installation/running.html
- https://www.apachefriends.org/index.html
- https://getcomposer.org/
- https://codeigniter.com/user_guide/installation/index.html
- https://codeigniter.com/user_guide/intro/requirements.html
- https://codeigniter.com/user_guide/changelogs/index.html

## How to setup CodeIgniter Project

### Starting from Scratch: 
Install CodeIgniter for our `ci-app` project using Composer
```bash
composer create-project codeigniter4/appstarter ci-app
cd ci-app
``` 
Rename `env` file to `.env`
```bash
mv env .env
```

Open the `.env` file
- Set the environment to `development`
- Set app.baseURL to match your Apache setup
```
CI_ENVIRONMENT = development
```
- Save the file.

To verify that we're seeing the right pages, change the CodeIgniter welcome message in `app/Views/welcome_message.php` and refresh the browser.


### Continue with OS Specific Instructions
- MacOS: see [setup-macos.md](./setup-macos.md)
- Windows: see [setup-windows.md](.setup-windows.md)

 
