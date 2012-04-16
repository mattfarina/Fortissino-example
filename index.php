<?php

/**
 * @file
 * A demo index file for a Fortissimo application. View this page in a browser.
 */

// Reguie the composer autoloader.
require_once __DIR__ . '/vendor/.composer/autoload.php';

// Include the WebRunner. If you are creating a CLI application see the
// CLIRunner. Each enviornment has its own runner.
use Fortissimo\Runtime\WebRunner;

// Callbacks and commands are stored in a registry. No, this is not like the
// Windows registry!
use Fortissimo\Registry;

// Build the registry. Note, the registry is in the index file for demo purposes.
// You should organize your code in a more well structured manner.
$registry = new Registry();

// An example registry entry. Really simple.
$registry->route('foo')
  ->does('\Fortissimo\Command\EchoText', 'echo')
    ->using('type', 'text/plain')
    ->using('text', 'Hello Example Readers!');

$runner = new WebRunner();
$runner->useRegistry($registry);
$runner->run('foo');
