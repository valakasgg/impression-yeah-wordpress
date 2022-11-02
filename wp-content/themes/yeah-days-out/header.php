<!--

             ````                                
          ````                                   
       ``.`                     ``````....`      
     ``.`                 ```...............`    
    `..`              ``.....................`   
   `..`             ``.........................  
  `..`             `............................ 
 `...`             .............................`:
`....`             ..............................`
`....`             `.............................`
......`             `.............................
.......`              `...........................
`........`              `........................`
`..........``             ``.....................`
 ..............``            ``.................` 
 `.................```         ``..............` 
  `....................```        `...........`  
   `.......................``       `.......``   
    ``........................`       `....`     
      `........................`      `..`       
        `......................       ``         
          ``.................`                   
             ```...........``                    


Website by Northern Media

Get in touch - info@northernmediauk.com

-->
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <?php wp_head(); ?>
</head>

<!-- Header Here -->

<body <?php body_class(); ?>>

    <?php
    // Vars
    $logo  = get_field('header_logo', 'option');
    ?>

    <header>
        <div class="container">
            <div class="logo">

            </div>
            <nav>

            </nav>
            <div class="interaction">

            </div>
        </div>
    </header>

    <?php get_template_part('template-parts/nav'); ?>