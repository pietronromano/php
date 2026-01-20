# Section 6: Entity Classes: Editing and Deleting Existing Records

References:
- https://www.udemy.com/course/codeigniter-from-scratch/learn/lecture/39185626#overview
  
CodeIgniter Documentation:
- https://simple.wikipedia.org/wiki/Representational_state_transfer
- https://codeigniter.com/user_guide/incoming/routing.html#uri-segments
- https://codeigniter.com/user_guide/incoming/restful.html#resource-routes
- https://medium.com/@shubhangirajagrawal/the-7-restful-routes-a8e84201f206
 
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



