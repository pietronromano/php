# Section 6: Entity Classes: Editing and Deleting Existing Records

References:
- https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39185700#questions/21754430
  
CodeIgniter Documentation:
- https://codeigniter4.github.io/shield/customization/#custom-validation-rules
- https://codeigniter4.github.io/shield/concepts/#password-validators
- https://codeigniter4.github.io/shield/quickstart/#responding-to-magic-link-logins
 
---

### Run migrations
```bash
cd /Users/macbookpro/dev/php/github/php/cogeigniter/09-customize-shield/ci-app/
sudo php spark migrate 

### Copy files to the deployment folder
**NOTE:**: on macOS use "**Bash**", not the default "Zsh" terminal shell, as `cp -R` behaves differently in Zsh (omits the hidden files like `.env`).
- Set origin folder:
  ```bash
  origin_dir="/Users/macbookpro/dev/php/github/php/cogeigniter/09-customize-shield/ci-app/"
  ```

- Copy the contents of the `ci-app` folder to the `deployment/ci-app` folder:
  ```bash
  dest_dir="/Users/macbookpro/dev/php/github/php/cogeigniter/deployment/ci-app"
  sudo cp -R $origin_dir $dest_dir
  ```



