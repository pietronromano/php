# Section 6: Entity Classes: Editing and Deleting Existing Records

References:
- https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39185532#overview
  
CodeIgniter Documentation:
- https://codeigniter.com/user_guide/general/common_functions.html#old
- https://codeigniter.com/user_guide/models/entities.html
- https://codeigniter.com/user_guide/models/entities.html#filling-properties-quickly
- https://codeigniter.com/user_guide/models/entities.html#checking-for-changed-attributes
- https://codeigniter.com/user_guide/general/errors.html#pagenotfoundexception
- https://codeigniter.com/user_guide/incoming/incomingrequest.html#is
- https://codeigniter.com/user_guide/general/common_functions.html#esc
 
---

### Copy files to the deployment folder
**NOTE:**: on macOS use "**Bash**", not the default "Zsh" terminal shell, as `cp -R` behaves differently in Zsh (omits the hidden files lie `.env`).
- Set origin folder:
  ```bash
  origin_dir="/Users/macbookpro/dev/php/github/php/cogeigniter/06-entity-classes/ci-app/"
  ```

- Copy the contents of the `ci-app` folder to the `deployment/ci-app` folder:
  ```bash
  dest_dir="/Users/macbookpro/dev/php/github/php/cogeigniter/deployment/ci-app"
  sudo cp -R $origin_dir $dest_dir
  ```



