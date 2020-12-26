@ECHO OFF
REM A .bat file is a BATCH file which is for running a batch of CMD commands at once
REM @ECHO OFF is used to stop terminal commands in our BAT file from being displayed in CMD when they are run
REM This is a BAT comment
REM Comments are used to write text which will not be read as code to explain what code does and is for
REM stands for REMARK. Not the band!
:: This is another way of writing BAT comments

REM We can use ECHO without the @ symbol and then followed by a . and a phrase to display it
REM Let's display the phrase "Intro to CMD"
ECHO.Intro to CMD

REM In our BAT file we can run commands like dir to check what is in our directory
dir

REM Let's change the color of our terminal to white with blue text:
color F1

composer

composer require vlucas/phpdotenv

composer require eftec/bladeone

ECHO ON
