# Section 2: Codigniter and MVC Basics

References:
- https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39182318#overview


CodeIgniter Documentation:
- https://codeigniter.com/user_guide/outgoing/view_layouts.html
  

---

## Move to the project directory
```bash
cd codeigniter-4/hollingworth/02-mvc-basics/ci-app

``` 

## Configure the project with the .env file
- Open the `.env` file
  - Set app.baseURL to match your Apache setup
    ```env
    app.baseURL = 'http://localhost:8080/'
    ```
- Save the file.

---

## Run the built-in PHP Server
- In the terminal, navigate to the `ci-app` directory if you're not already there:
- Start the built-in PHP server:
```bash
php spark serve
```

- Open your web browser and navigate to `http://localhost:8080` to see the CodeIgniter welcome page.

- Stop the server by pressing `CTRL + C` in the terminal when you're done.

