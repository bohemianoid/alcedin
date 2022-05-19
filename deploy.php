<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/bohemianoid/alcedin.git');
set('bin/php', 'php81');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('s076.cyon.net')
    ->set('remote_user', 'simonrot')
    ->set('deploy_path', '~/public_html/simonrot/alcedin.bohemiano.id/alcedin');

// Tasks

task('deploy:writable')->disable();

task('build', function () {
    cd('{{release_path}}');
    run('npm run build');
});

after('deploy:failed', 'deploy:unlock');
