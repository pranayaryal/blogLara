# config valid for current version and patch releases of Capistrano
lock "~> 3.10.1"

set :application, "digital.doe1915.com"
set :deploy_to, '/opt/sites/digital.doe1915.com'
set :repo_url, "git@github.com:doeanderson/digital.git"

# Default branch is :master
ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

append :linked_files, ".env"

SSHKit.config.command_map[:composer] = "php #{shared_path.join("composer.phar")}"

append :linked_dirs, 
'storage/app',
'storage/framework/cache',
'storage/framework/sessions',
'storage/framework/views',
'storage/logs',
'public/images'

namespace :deploy do
#   after :updated, "composer:images_copy"
  after :updated, "composer:vendor_copy"
  after :updated, "composer:install"
  after :finished, "laravel:migrate"
#   before 'deploy:symlink:release', "composer:images_owner"
end
