<?php

namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'hajusrakendused');
set('remote_user', 'virt98409'); //virt...
set('http_user', 'virt98409');
set('keep_releases', 2);

// Hosts
host('ta20maidra.itmajakas.ee')
    ->setHostname('ta20maidra.itmajakas.ee')
    ->set('http_user', 'virt98409')
    ->set('deploy_path', '~/domeenid/www.ta20maidra.itmajakas.ee/hajus')
    ->set('branch', 'master');

// Tasks
set('repository', 'git@github.com:kristjanmaidra/hajusrakyl.git');
//Restart opcache
task('opcache:clear', function () {
    run('killall php80-cgi || true');
})->desc('Clear opcache');

task('build:node', function () {
    cd('{{release_path}}');
    run('npm i');
    run('npx vite build');
    run('rm -rf node_modules');
});
task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'build:node',
    'deploy:publish',
    'opcache:clear',
    'artisan:cache:clear'
]);
after('deploy:failed', 'deploy:unlock');
