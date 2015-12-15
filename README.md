Filling the void of simplicity mixed with cross platform capability. Just include the index.php file and start accepting user inquiries today. Customize look and feel, validation and settings. Use it on native PHP, Wordpress, Joomla, Drupal or any other system.

* Fully responsive
* Ability to set configuration options
* Ability to set CC and BCC fields
* Ability to select between a light and dark theme
* No JavaScript conflicts what so ever
* Ability to further customize the CSS code
* Protection against XSS and malicious input
* Unique captcha generation without any third party HTTP requests
* Customizable heading, drop down field and error messages
* Auto reply email


###File Structure

`
│ config.php
│ index.php
│
├───css
│ skin-stylesheet.css
│ stylesheet.css
`

###Installing

Put the folder "Contactos" anywhere in your web root and use `<?php include("path-to-folder/index.php"); ?>` on the place you desire for the web form to appear.

For CMS syste like Wordpress or Joomla you might wanna include this directly into the template/theme files. The form is desined to fit inside an existing page. Not standalone.


###Configuration

In the config.php file you can control the following:

**Form settings**

`$styleSheet = 0; //0 for default skin, 1 for grey skin`

`$contact_form_title = "Contact Us";`

`$send_to = "send@email.com"; // Send requests from the form to this email address`

`$cc_to = "myotheremail@email.com"; // Will CC to this email address`

`$bcc_to = "secret@email.com"; // Will BCC to this email address`

`$mail_title = "Hello from feedback form"; // Subject of the mail`
`

**AutoReply Mail**

`$send_confirmation = "Y"; //Send confirmation email to the user who submit the request - Y for "Yes" N for "No"`

`$confirmation_message = "We have recieved your inquiry. We will respond shortly"; //Message in the confirmation email`

`$confirmation_mail_title = "Thank you for contacting us"; // Subject of the confirmation mail`

`$confirmation_mail_from = "donotreply@email.com"; // from address of confirmation mail`
`

**Field Validation**

`$validate_field_name= "N"; //Validate field_name - Y for "Yes" N for "No"`

`$field_name_required = "Y"; //field_name required - Y for "Yes" N for "No"`
`

Every feild in the contact form can be checked for input and if there is input proper validation is then invoked based on your settings.
