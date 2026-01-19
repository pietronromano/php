# Section 5: Validation and Output Escaping

References:
- https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39185486#overview
  
CodeIgniter Documentation:
- https://codeigniter.com/user_guide/models/model.html#in-model-validation
- https://codeigniter.com/user_guide/libraries/validation.html#rules-for-general-use
- https://codeigniter.com/user_guide/general/common_functions.html#redirect
- https://codeigniter.com/user_guide/general/common_functions.html#old
- https://codeigniter.com/user_guide/libraries/sessions.html#flashdata
- https://codeigniter.com/user_guide/general/common_functions.html#esc
- https://www.php.net/manual/en/function.htmlspecialchars.php
 
---

### Copy files to the deployment folder
**NOTE:**: on macOS use "**Bash**", not the default "Zsh" terminal shell, as `cp -R` behaves differently in Zsh (omits the hidden files lie `.env`).
- Set origin folder:
  ```bash
  origin_dir="/Users/macbookpro/dev/php/github/php/cogeigniter/05-validation/ci-app/"
  ```

- Copy the contents of the `ci-app` folder to the `deployment/ci-app` folder:
  ```bash
  dest_dir="/Users/macbookpro/dev/php/github/php/cogeigniter/deployment/ci-app"
  sudo cp -R $origin_dir $dest_dir
  ```



