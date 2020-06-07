# portfolio
Programmer portfolio website with blog section to write and manage articles.

![Homepage Snapshot](storage/app/public/portfolio.png?raw=true "Homepage")

# Initial Installation Instruction

- clone repository on your local
- `cd portfolio`
- `cp .env.example .env`
- `composer install`
- update .env file with your  `DB_DATABASE,DB_USERNAME,DB_PASSWORD`
- `sudo chmod -R 775 storage`
- `php artisan key:genenrate`
- `php artisan migrate --seed`
- `php artisan storage:link`

in your database/factories folder there is a file UserFactory.php which has your default email and password whih is:    
`email: user@portfolio.com`  
`password: password`  
you can use this for logging in or update email and password and run command  
`php artisan migrate:fresh --seed`   
to generate new default email password combination.

# Article Section Instruction

This project contains a article section which after logging in you can acccess by  
clicking on **My Article** menu
![My Article Menu](storage/app/public/my-article-menu.png?raw=true "My Article")

- you can enable disable login/registration easily from your .env file  
  open your .env file which has  
  `CAN_REGISTER=true`  
   `CAN_LOGIN = true`  
   just set it to false when needed, and you are all set.
   
now click on **My Articles** which will take you to article administration dashboard of your website.
![Article Dashboard](storage/app/public/article-dashboard.png?raw=true "Article Dashboard")

from here you can explore more about an article and administration

It project is using [Canvas](https://github.com/cnvs/canvas) for article management which has other cool features which will help you in enabling Unsplash to pull stock images in your post.  
you can read more about it on [Canvas Readme](https://github.com/cnvs/canvas) page, when you are ready add you [Unsplash](https://unsplash.com/oauth/applications) key in your .env file `CANVAS_UNSPLASH_ACCESS_KEY` section.  

NOTE: before using this on your production deployment please updated app.blade.php and other places for SEO keywords like in your HomeScreen.vue file  
         `<vue-headful
             title="Kumar Ravi | Laravel Developer"
             description="kumar ravi is experienced laravel developer, Technology in his hand includes laravel, AWS, vue etc. can work remote."
             keywords="laravel developer in ncr, laravel developer in delhi, experienced laravel web developer remote"
         />`  
this should be updated before your deployment.

# Open Source Declaration
Here are some open source libraries used in this project which you can read more about

- [Canvas](https://github.com/cnvs/canvas)
- [Canvas Studio](https://github.com/cnvs/studio)
- [Laravel env](https://github.com/msztorc/laravel-env)
- [Tailwind Portfolio Design Component](https://tailwindcomponents.com/component/developer-portfolio)
- [Tailwind](https://tailwindcss.com/)

# Contribution

- This can be your first open source contribution, don't hesitate on getting started, just do the change you think could be great addition for this project and raise a PR.

## License

The Project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
         




