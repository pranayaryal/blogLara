# config valid only for current version of Capistrano
lock "3.8.0"

set :application, "Doe-Anderson-Digital-Blog"
set :repo_url,  "git@github.com:doeanderson/digital"
set :deploy_to, "/opt/sites/digital.doe1915.com"

set :keep_releases, 5

# set :linked_dirs, %w{storage storage/app storage/framework storage/logs}

SSHKit.config.command_map[:composer] = "php #{shared_path.join("composer.phar")}"

namespace :deploy do
  after :starting, 'composer:install_executable'
end
