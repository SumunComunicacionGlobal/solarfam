[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

solarfam
===

Hi. I'm a starter theme called `solarfam`. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

The ultra-minimal SCSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

* A modern workflow with a pre-made command-line interface to turn your project into a more pleasant experience.
* A just right amount of lean, well-commented, modern, HTML5 templates.
* Some small tweaks in `inc/template-functions.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* Smartly organized starter SASS in `sass/style.scss` that will help you to quickly get your design off the ground.
* Full support for `WooCommerce plugin` integration with hooks in `inc/smn_woocommerce.php`, styling override woocommerce.css with product gallery features (zoom, swipe, lightbox) enabled.
* Licensed under GPLv2 or later. :) Use it to make something cool.

Installation
---------------

### Requirements

`solarfam` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/) Just for Hybrid Themes

### Quick Start

Clone or download this repository, change its name to something else (like, say, `project-name`), and then you'll need to do a six-step find and replace on the name in all the templates.

1. Search for `'_sumun'` (inside single quotations) to capture the text domain and replace with: `'project-name'`.
2. Search for `Text Domain: solarfam` in `style.css` and replace with: `Text Domain: project-name`.
3. Search for `solarfam` (in uppercase) to capture constants and replace with: `Nombre_proyecto`.
4. Search in package.json for `sumun` to to change the theme name: `project-name`.
5. Optionally, search for `smn_` to capture all the functions names and replace with: `project_name_`.


Then, rename `solarfam.pot` from `languages` folder to use the theme's slug. Next, update or delete this readme. You can search and replace in this file like the quick Star.

### Setup

To start using all the tools that come with `solarfam`  you need to install the necessary Node.js and Composer dependencies :

```sh
$ npm install
```

### Available CLI commands

`solarfam` comes packed with CLI commands tailored for WordPress theme development :

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `npm run compile:css` : compiles SASS files to css.
- `npm run compile:js` : compiles JS files to min.js.
- `npm run watch` : watches all SASS files and recompiles them to css when they change.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.
- `npm run sync` : Browser syncs listen all files. Maybe you have to change the port. By default: `localhost:8888/solarfam/`.
- `npm run dev` : Run watch and sync to develop your awesome theme.


### Theme.json

Recuerda que `solarfam` es un starter theme para versiones superiores a 6.0 de WordPress y trae incorporado el archivo `theme.json` para poder configurar, dar estilos y muchas mas opciones. Consulta en: [Global Settings & Styles (theme.json)](https://developer.wordpress.org/block-editor/how-to-guides/themes/global-settings-and-styles/).

Sique estos sencillos pasos para empezar a configurar el editor de tu theme y las correspondencias en el frontend.

#### Settings

1. Configura las paletas de color, mejor si solo cambias el hexadecimal, en caso de que necesites más colores sigue la nomenclatura, `primary-20` o `secondary-90`por ejemplo.
2. Personaliza el `border-radius`, `box-shadow`, paleta de color de grises (solo cambia el hexadecimal), `layout`y lo que consideres necesario.
4. Search for `solarfam` (in uppercase) to capture constants and replace with: `Nombre_proyecto`.
5. Search in package.json for `sumun` to to change the theme name: `project-name`.
6. Optionally, search for `smn_` to capture all the functions names and replace with: `project_name_`.


Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
