# An SH file is a Shell file which is used to run severl linux terminal commands at once
# These are Shell comments
# We can use the echo keyword to display text in the terminal
echo "Intro to Shell"

# In our SH file we can run any commands like ls to check what is in our directory

ls

echo "Intro to Composer"

# Composer is a package manager for PHP. A package manager is used to download third-party libraries.
# You can write commmands in the terminal to download PHP packages using Composer.
# To download and install Composer, on Windows, go to the website, download the wizard and go through the steps but be sure to add Composer to the PATH variable of your computer. To check if Composer installed successfully, open the terminal and enter the command "composer"

composer

# Whenever you enter the command composer with the command require to install a package all of the files will be downloaded into a folder in the root directory of your project called "vendor".

# A JSON file called composer.json will also be created in your project's root directory which will list all of the required packagfes for your project.

echo "Intro Dotenv"

# We are going to use Composer to install a package called phpdotenv in our app's root directory.
# Navigate to the root directory of your project and enter the following command to install it:

composer require vlucas/phpdotenv

# Once your run this command a vendor folder will automatically be created in the root directory.
# This folder is for external libraries for PHP and should always go in the root directory.

echo "Intro to BladeOne"

# Despite PHP being originally designed specifically to be an HTML templating language, some people do not like the default HTML templating syntax and have created enhanced templating languages for PHP.
# The MVC framework Laravel uses their own templating langauge called Blade which makes creating HTML templates with PHP much easier.

# Despite Blade being designed specifically to work with Laravel, it has become so popular that ther have been several adaptations of it which can be used outside of Laravel. BladeOne was designed after Blade and shares most of the same features and syntax.

# To install BladeOne using Composer enter the following Composer command:
composer require eftec/bladeone