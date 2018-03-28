PHPUnit wrapper for Drupal 7
============================

### Status

Build status: ![National-Theatre/drupal-phpunit build status](https://api.travis-ci.org/National-Theatre/drupal-phpunit.svg?branch=master)

### Prerequisites

- Composer

### Installation

Include this package in your `composer.json` file as:

    {
      "require": {
        "NT/drupal-phpunit": "dev-master"
      },
      "repositories": [
        {
          "type": "git",
          "url": "https://github.com/National-Theatre/drupal-phpunit.git"
        }
      ],
    }

### Usage

To use this package in your tests, you need to extend your classes using `DrupalTestCase` class, for example:

    use NT\Drupal\Testing\PHPUnit\DrupalTestCase;

    class MyOwnTest extends DrupalTestCase {
      // Methods here.
    }
