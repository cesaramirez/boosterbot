<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'boosterbot');

// Project repository
set('repository', 'https://github.com/cesaramirez/boosterbot.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);


// Hosts

host('root@206.189.160.10')
    ->set('deploy_path', '/var/www/boosterbot.iscodedby.me');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php7.2-fpm.service');
});

after('deploy:symlink', 'php-fpm:restart');


// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
