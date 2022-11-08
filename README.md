# Yeah WordPress Theme

WordPress theme created as a test for  **impression.studio** using a simple flexible content system, allowing easy editing. CSS & JS assets are managed using CodeKit which includes browsersync and the use of industry standard tools creating an enjoyable development experience.

I originally setup webpack in the theme folder with the aim to use Tailwind but struggled to get BrowserSync working. I decided to not waste anymore time and to use CodeKit as it works flawlessly and I've rarely run into issues.

I've used a range of JS libraries and CSS for simple animations to show what is possible. The pagination has the correct positioning but unfortunately isn't updating and have done lots of testing with it, I can only think of using something different to get it working which would be Slick Slider.

## How its built.

The bulk of the work is done using the Advanced Custom Fields Plugin with some Addons. Utilising the Flexible Content field, when a new block inside flexible-content is created,    flexible-content.php file will search for a matching component file.

For the animations, I've used simple CSS keyframes for the pulse effect, AOS JS fade in once in viewport and an advanced SVG Morph using anime.js

### Local Installation

1. Install & Setup MAMP + PHPMYADMIN
2. Download latest WordPress
3. Clone this repo
4. Move wp-admin & wp-includes into the directory
5. Import database provided into your created database.
6. Enter your local site name in wp-config
7. Enter your database config into wp-config/wp-config-local.php


### Server setup

1. Setup WordPress Hosting Package
2. Create a database (utf8)
3. Download latest WordPress
4. FTP in & move latest WordPress to server directory (usually public_html)
5. Download this repo & move into the same directory
6. Import database provided into your created database.
7. Edit wp-config folder and files with your database connection info

### See admin login details in login.txt