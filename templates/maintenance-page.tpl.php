<?php

/**
 * @file
 * Implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in page.tpl.php.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 * @see bartik_process_maintenance_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>"
      lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">
<head>
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <?php print $styles; ?>
    <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes; ?>>
<?php
//TODO !!! Zmenit template pro nedostupnou stranku !!!
$path = drupal_get_path('theme', 'pribehovymotiv');
$image_path = $path . '/img/underconstruction.jpg';
?>
<div id="UnderConstruction"
     style="width: 100%; height: 100%; background-color: black; background-repeat: no-repeat; background-size: contain; background-position: center center; background-image: url('<?php echo $image_path; ?>'); "
     title="Viribus unitis"></div>
</body>
</html>
