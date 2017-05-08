# full-width-page

Adds a new type of page type to the Wordpress blog - A full-width page.

This is quick'n dirty code, crafted for my own blog/theme only. It's not a
fully functional Wordpress plugin.

It's adapted to my favorite theme, Annina, but can easily be adapted or generalised as well.

Free software, @imifos

-----------

The ```fullwidth-page.php``` file is a copy of the "simple page" page.php base file into my own child template.

Here, I just remove the ```<?php get_sidebar(); ?>``` part. Adding ```Template Name: Full Width``` into the top comment makes
Wordpress recognise this file as page template. It becomes thus selectable in the page edit screen.

The JavaScript part is some quick'n dirty magic. As Annina has a permanent side bar - not the widget bar - I use a small jQuery
 script to dynamically remove it after the page has been rendered. It's not the most clean solution, but allows to avoid
 complex modifications in the theme's code. As consequence, no issues with theme updates et al.

