<div align="center" id="top"> 
  <img src="./.github/app.gif" alt="Nik Parser Php" />

&#xa0;

  <!-- <a href="https://nikparsephp.netlify.app">Demo</a> -->
</div>

<h1 align="center">NIK Parser PHP</h1>

<p align="center">
  <img alt="Github top language" src="https://img.shields.io/github/languages/top/bangadam/nik-parse-php?color=56BEB8">

  <img alt="Github language count" src="https://img.shields.io/github/languages/count/bangadam/nik-parse-php?color=56BEB8">

  <img alt="Repository size" src="https://img.shields.io/github/repo-size/bangadam/nik-parse-php?color=56BEB8">

  <img alt="License" src="https://img.shields.io/github/license/bangadam/nik-parse-php?color=56BEB8">

  <img alt="Github issues" src="https://img.shields.io/github/issues/bangadam/nik-parse-php?color=56BEB8" />

  <img alt="Github forks" src="https://img.shields.io/github/forks/bangadam/nik-parse-php?color=56BEB8" />

  <img alt="Github stars" src="https://img.shields.io/github/stars/bangadam/nik-parse-php?color=56BEB8" />
</p>

<!-- Status -->

<!-- <h4 align="center">
	🚧  Nik Parse Php 🚀 Under construction...  🚧
</h4>

<hr> -->

<p align="center">
  <a href="#dart-about">About</a> &#xa0; | &#xa0; 
  <a href="#sparkles-features">Features</a> &#xa0; | &#xa0;
  <a href="#rocket-technologies">Technologies</a> &#xa0; | &#xa0;
  <a href="#white_check_mark-requirements">Requirements</a> &#xa0; | &#xa0;
  <a href="#checkered_flag-starting">Setup</a> &#xa0; | &#xa0;
  <a href="#rocket-technologies">Usage</a> &#xa0; | &#xa0;
  <a href="#memo-license">License</a> &#xa0; | &#xa0;
  <a href="https://github.com/bangadam" target="_blank">Author</a>
</p>

<br>

## :dart: About

NIK Parser is a package to convert Indonesian citizenship identity number into usefull information.

## :sparkles: Features

:heavy_check_mark: All information of NIK number identification like province, birthdate, age etc.\

## :rocket: Technologies

The following tools were used in this project:

- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)

## :white_check_mark: Requirements

Before starting :checkered_flag:, you need to have [PHP](https://www.php.net/) and - [Composer](https://getcomposer.org/) installed.

## :checkered_flag: Setup

```bash
# Clone this project
$ git clone https://github.com/bangadam/nik-parse-php

# Access
$ cd nik-parse-php

# Install dependencies
$ composer install
```

## :rocket: Usage

```php
<?php

use NikParser\NikParser;
require __DIR__.'/vendor/autoload.php';

try {
    $nikParser = new NikParser("3509211202010006");

    var_dump($nikParser->getAll());

} catch (\Exception $e) {
    echo $e->getMessage();
}
```

## :memo: License

This project is under license from MIT. For more details, see the [LICENSE](LICENSE.md) file.

Made with :heart: by <a href="https://github.com/bangadam" target="_blank">Muhammad Adam</a>

&#xa0;

<a href="#top">Back to top</a>
