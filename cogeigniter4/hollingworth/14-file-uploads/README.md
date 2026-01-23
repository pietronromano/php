# Section 14: File Uploads

References:
- https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39185944#questions/21754430
  
CodeIgniter Documentation:
- https://codeigniter.com/user_guide/helpers/form_helper.html#form_open
- https://codeigniter.com/user_guide/libraries/uploaded_files.html
- https://www.php.net/manual/en/features.file-upload.errors.php
- https://codeigniter.com/user_guide/libraries/files.html#new-features
- https://developer.mozilla.org/en-US/docs/Web/HTTP/Guides/MIME_types/Common_types
- https://codeigniter.com/user_guide/libraries/images.html
- https://codeigniter.com/user_guide/general/common_functions.html#core-constants
- https://codeigniter.com/user_guide/libraries/files.html#moving-files
- https://www.php.net/manual/en/function.readfile.php
- https://www.php.net/manual/en/class.finfo.php
- https://codeigniter.com/user_guide/outgoing/response.html#setting-headers
 
---
 

### Copy files to the deployment folder
**NOTE:**: on macOS use "**Bash**", not the default "Zsh" terminal shell, as `cp -R` behaves differently in Zsh (omits the hidden files lie `.env`).
- Set origin folder:
  ```bash
  origin_dir="/Users/macbookpro/dev/php/github/php/cogeigniter/14-file-uploads/ci-app/"
  ```

- Copy the contents of the `ci-app` folder to the `deployment/ci-app` folder:
  ```bash
  dest_dir="/Users/macbookpro/dev/php/github/php/cogeigniter/deployment/ci-app"
  sudo cp -R $origin_dir $dest_dir
  ```



