# config valid only for current version of Capistrano
lock "3.8.0"

set :application, "Doe-Anderson-Digital-Blog"
set :repo_url,  "git@github.com:doeanderson/digital"
set :deploy_to, "/opt/sites/digital.doe1915.com"

set :keep_releases, 5

# set :linked_dirs, %w{storage bootstrap}
# after :deploy, 'composer:move'
# after 'composer:move', 'composer:install'
after :deploy, 'shared_files:move'
after 'shared_files:move', 'artisan:cache'
