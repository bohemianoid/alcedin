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

import('inventory.yaml');

// Tasks

task('deploy:writable')->disable();

task('build', function () {
    cd('{{release_path}}');
    run('npm run prod');
});

after('deploy:failed', 'deploy:unlock');
