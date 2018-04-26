<?php
$cssDir = "css/"; //folder where all CSS files live

//Link each page to its CSS file
$styles = [
    'home.php' => 'home.css',
    'about.php' => 'about.css',
    'contact.php' => 'contact.css',
];

?>
<!-- CSS common to all pages -->
<link rel="stylesheet" type="text/css" href="<?="$cssDir/common.css"?>>
<!-- CSS, specific to the current page -->
<link rel="stylesheet" type="text/css" href="<?="$cssDir/$styles[$this_page]"?>>

<!-- https://stackoverflow.com/questions/38154802/how-to-properly-link-css-files-with-php-footer-and-header -->
