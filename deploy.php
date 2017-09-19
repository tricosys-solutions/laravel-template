<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'laravel-template');

// Project repository
set('repository', 'https://github.com/tricosys-solutions/laravel-template.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('202.88.188.165')
    ->user('tricosys')
    ->multiplexing(false)
    ->port(22)
    ->identityFile('~/.ssh/id_rsa')
    ->set('deploy_path', '~/{{application}}');    
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');