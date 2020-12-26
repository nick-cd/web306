# Week 1 Lecture Notes

## HTML

### HTML universal template

```html
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0>"
    <title>Document</title>
  </head>
  <body>
  </body>
</html>
```

Notes about heading tags:
* You must start your HTML page with an h1 tag.
* You must not skip from one number to the next.

### How many ```<h1>``` tags can you have in an HTML page?

**A. 1 per sectioning tag**

Historically there was a rule that you can only have one h1 tag per HTML page
but this was changed with HTML 5.

### Section tag

```html
<section>
  <h1>Second heading 1</h1>
</section>
```

Sectioning content elements are elements which are used to define sections
where the numbering of heading tags restarts.
This means that every sectioning content element can have its own h1 tag, but
only one.

```html
<section>
  <h1>Second heading 1<h1>
  <article>
    <h1>Third Heading 1</h1>
  </article>
</section>
```

## CSS

CSS targets HTML using selectors.
Selectors are the name of the tag or identifier to target something.

```html
<head>
  <!-- other stuff -->
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <!-- site code -->
</body>
```

```css
/* selector for the body tag */
body {

}

/* selector for a class */
.class-name {

}

/* selector for an id */
#some-id {

}

/* selector for selecting elements that have a name attribute with value of 'email' */
[name="email"] {

}

/* target multiple elements, targets separated by ',' */
h1, h2 {

}

/* target nested selectors */
nav ul li {

}

/* target direct children */
nav > ul > li {

}

/* target all elements */
* {

}
```
### Inline vs. Block elements

Every HTML element has a default display of either _inline_ or _block_

* _Inline_ elements take up one line and are restricted to the content of that
  line.
* _Block_ elements start on a new line and take up 100% of the width of the
  screen.

```html
<span>Inline</span>
<span>Inline</span>
<div>Block</div>
<span>Inline</span>
```

We are going to style this HTML with:

```css
div, span {
  background: lightblue;
  padding: 30px;
}
```

This will show the:
* first two inline elements together on the first line
* block element taking up all of the next line
* last inline element taking up a part of the next line (after the block
  element)

**This is an important concept to understand.**

### Inline block element

```css
div, span {
  background: lightblue;
  padding: 30px;
}

.inline-block {
  display: inline-block;
  padding: 30px;
}
```

```html
<span>Inline</span>
<span>Inline</span>
<div class="inline-block">Inline-Block</div>
<div>Block</div>
<div>Block</div>
<span>Inline</span>
```

This will display the inline block element beside the first 2 inline elements.
They essentially combine the qualities of block and inline elements. That is,
they:

* stay on one line
* take up the same amount of space as the content
* respond differently to padding, it is a lot better. It responds the way we
  expect it to.

## Servers and PHP

In order to install PHP, we are going to install XAMPP.

### What is a server?

> A server is a computer program that provides a service to another computer
> program (and its user). In a data center, the physical computer that a server
> program runs in is also frequently referred to as a server. That machine may
> be a dedicated server or it may be used for other purposes as well.

### What is a Back-End Developer?

> A back-end developer is a type of programmer who creates logical back-end and
> core computational logic of a website, software or information system. The
> developer creates components and features that are indirectly accessed by a
> user through a front-end application or system.

#### Back-End Languages

* Java
* C
* C++
* C#
* Ruby
* Python
* Perl
* PHP
* Node.js (and therefore JavaScript)
* SQL

#### Back-End Frameworks

* Ruby on Rails
* Django
* Laravel - what we're using in the course, it is the most popular PHP
  framework
* Phalcon
* Sails.js
* Many More!

### Hyper-Text Transfer Protocol

* Client on one end
* Server on the other end

1. The client sends a request to the server.
2. In response, the server processes a server-side language like PHP, Python or
  Ruby on the back end and returns HTML, CSS and JavaScript code to display a
  web page on the front end.

### Software stack

> A developer's "stack" is the collection of software they use together.
>
> This is where the term "full-stack" developer comes from
>
> To be a "full-stack" developer would mean that you are proficient with
> software from the front-end and the back-end

#### LAMP Stack

This is a popular stack. It consists of:

* L - Linux (Operating system)
* A - Apache (Server Software)
* M - MySQL/MariaDB (database software)
* P - PHP/Perl/Python (Programming Language)

##### Unix

* Proprietary Operating system
* Almost all non-windows operating systems were based on it
* This includes Linux, MacOS, Android, IOS etc.

##### GNU/Linux

###### GNU

* (GNU) Gnu's Not Unix
* Unix-like operating system that was an open source alternative to Unix
* Created in protest to Unix.

###### Linux

* Not the full operating system
* Small important part of GNU called the kernel
* Linux is better at branding than GNU so people just refer to the whole OS as
  Linux.


#### Other Stacks

LAMR - Ruby developers
MEAN - NodeJS developers

#### XAMPP Stack

* X - Any operating system
* A - Apache (server software)
* M - MySQL/MariaDB (database software)
* P - PHP (programming language)
* P - Perl (second programming language) - not used in this course

#### MAMP Stack

* M - MacOS
* A - Apache (Server software)
* M - …
* P - …

### PHP

PHP - _"PHP: Hyper-Text Preprocessor"_

The first 'P' in PHP stands for: _"Personal Home Page"_

#### History of PHP

* PHP was created by Rasmus Lerdorf in 1994
* He is a Danish-Canadian programmer who grew up in King City and graduated
  from the university of waterloo.
* Rasmus previously worked for Yahoo! And now works for Etsy.

It was originally created so that Rasmus could make a personal website (hence
the name, _Personal Home Page_). Watch his [speech on PHP](http://www.youtube.com/watch?v=rKXFgWP-2xQ)

#### About PHP

It is a templating language for HTML.

It's easier template HTML compared to other languages. It's very accessible.

When you use PHP, there is no need to install additional software as we can mix
PHP code into HTML code by default without any frameworks (this is the only
server-side software with this feature).

PHP is used on 80% of websites!

#### Programming in PHP

To use PHP with any HTML page, just resave that page as a .php file. PHP files
can read both HTML and PHP code.

To use PHP, we need to use special tags in our HTML:

```php
<?php ?>
```

#### Example PHP code

Inside of the PHP is where PHP code would go and outside of the PHP tag is
where HTML would be.

The PHP tags can appear anywhere we would like to place our HTML code.

```php
<?php
// this is a single-line comment!
/*
 * This is a
 * block comment!
 */
?>
<!DOCTYPE html>
<html lang="en">
  <!-- … -->
</html>
```

#### Variables and Data Types

The '$' is used to define variables

```php
$title = "Intro to PHP";
```

Variables must start with a letter or underscore. Characters afterward can be
any alphanumeric character. Variable names a case-sensitive.

##### Data Types

There are 10 primitive data types in PHP. The 7 most common are:

* String
  ```php
  $name = "Nick";
  $description = 'A description';
  ```
* Integer
  ```php
  $age = 24;
  ```
* Float
  ```php
  $average = 4.365;
  ```
* Boolean
  ```php
  $teaching = true;
  $on_break = false;
  ```

##### Variable Naming Conventions

```php
$snake_case // more popular in PHP
$camelCase // also used, popular with class names
```

