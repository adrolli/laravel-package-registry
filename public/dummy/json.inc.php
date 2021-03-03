<?php

$composerJsonDependencies = array("require", "require-dev", "replace", "provide", "conflict", "suggest");
$packageJsonDependencies = array("dependencies", "devDependencies", "peerDependencies");

$composerLink = $ghRepoBase . '/composer.json';
$packageLink = $ghRepoBase . '/package.json';

$composerFile = @file_get_contents($composerLink);
$packageFile = @file_get_contents($packageLink);

if ($composerFile === FALSE) {
  unset($composerFileJson);
} else {
  $composerFileJson = json_decode($composerFile, true);
}

if ($packageFile === FALSE) {
  unset($packageFileJson);
} else {
  $packageFileJson = json_decode($packageFile, true);
}