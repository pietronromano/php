# PHP From Scratch

Sources:
- COURSE: https://www.udemy.com/course/php-from-scratch-course

Sources:
- COURSE: https://www.udemy.com/course/php-from-scratch-course
- SOURCE: Course download files

## Change to subdirectory
- VS Code: Right click on the directoy -> "Copy Relative Path"
- Open Terminal (Powershell for Windows, Bash for Mac)
- cd + CTRL + P (to paste in the path)


## SandboxUsage
1. Run a PHP file directly from the terminal:
   ```bash
   php index.php
   ```

2. Debug a PHP file
- Open the File
- Top right hand of screen: "Debug PHP file"

3. Run a local development server:
   ```bash
   php -S localhost:8000
   ```
   Then open your browser and navigate to `http://localhost:8000`.

**NOTE:** Fortunately, Laragon's virtual host setup doesn't interfere with the simple PHP built-in server usage, which can be run from any folder, even with the same port as Apache.