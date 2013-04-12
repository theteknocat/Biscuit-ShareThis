How To Install/Use
==================

1. Sign up at http://sharethis.com
2. Get the button code you want
3. Look at the script tag it gives you for "publisher=XXXXXXXXXXXXX" and copy the publisher ID - everything between the equal sign and then next ampersand
4. Add a new row to the system_settings db table with "constant_name" SHARE_THIS_PUBLISHER_ID and paste the publisher id into the "value" column
5. If you want the extension to be installed globally, add it to the extensions DB table with an "is_global" value of 1. Note that the Blog Module
   will load this extension automatically if it's found in your extensions path.
6. To customize the button code, make a "share_this/views" folder in "extensions/customized" with a file called "button.php". Paste your desired button
   code from sharethis.com. If you don't bother doing this, the extension will render email, Facebook and Twitter buttons along with a share this
   button that opens a popup on hover with all the available share this buttons.
7. To output your button code in your page, edit the view or template and put in <?php echo $ShareThis->render_button(); ?>, except if you are using
   the blog module, which has it's own method for rendering the button that's included in the default view, which checks if the extension is installed
   before trying to render.

Note: This extension only lets you customize the button output, but not the options available for the popup script. It opens the share popup in an iframe and allows it to be seen over top of embeds (like Flash) and you cannot change that. If you wish to do a completely customized share this button then don't use this extension.  Instead, put your share this code into your templates/pages manually.