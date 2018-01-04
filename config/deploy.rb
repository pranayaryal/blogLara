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
'storage/logs'

namespace :composer do
  desc "Running Composer Install"
  task :install do
      on roles(:composer) do
          within release_path do
              execute :composer, "install --no-dev --quiet --prefer-dist --optimize-autoloader"
          end
      end
  end

  desc 'Copy vendor directory from last release'
  task :vendor_copy do
      on roles(:composer) do
          puts ("--> Copy vendor folder from previous release")
          execute "vendorDir=#{current_path}/vendor; if [ -d $vendorDir ] || [ -h $vendorDir ]; then cp -a $vendorDir #{release_path}/vendor; fi;"
      end
  end

  desc 'Copy images directory from last release. Chown them'
  task :images_copy do
      on roles(:composer) do
          puts ("--> Copy images folder from previous release")
          execute "imagesDir=#{current_path}/images; if [ -d $imagesDir ] || [ -h $imagesDir ]; then cp -a $imagesDir #{release_path}/images; sudo chown -R www-data:www-data #{release_path}/images; fi;"
      end
  end
end

namespace :laravel do
  task :fix_permission do
      on roles(:laravel) do
          execute :chmod, "-R ug+rwx #{shared_path}/storage/ #{release_path}/bootstrap/cache/"
          execute :chgrp, "-R www-data #{shared_path}/storage/ #{release_path}/bootstrap/cache/"
      end
  end

  desc "Run Laravel Artisan migrate task."
  task :migrate do
      on roles(:laravel) do
          within release_path do
              execute :php, "artisan migrate --force"
          end
      end
  end

  desc "Run Laravel Artisan seed task."
  task :seed do
      on roles(:laravel) do
          within release_path do
          execute :php, "artisan db:seed --force"
          end
      end
  end

  desc "Optimize Laravel Class Loader"
  task :optimize do
      on roles(:laravel) do
          within release_path do
              execute :php, "artisan clear-compiled"
              execute :php, "artisan optimize"
          end
      end
  end
end

namespace :deploy do
  after :updated, "composer:vendor_copy"
  after :updated, "composer:images_copy"
  after :updated, "composer:install"
  after :finished, "laravel:migrate"
end

# Default deploy_to directory is /var/www/my_app_name
# set :deploy_to, "/var/www/my_app_name"

# Default value for :format is :airbrussh.
# set :format, :airbrussh

# You can configure the Airbrussh format using :format_options.
# These are the defaults.
# set :format_options, command_output: true, log_file: "log/capistrano.log", color: :auto, truncate: :auto

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
# append :linked_files, "config/database.yml", "config/secrets.yml"

# Default value for linked_dirs is []
# append :linked_dirs, "log", "tmp/pids", "tmp/cache", "tmp/sockets", "public/system"

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for local_user is ENV['USER']
# set :local_user, -> { `git config user.name`.chomp }

# Default value for keep_releases is 5
# set :keep_releases, 5

# Uncomment the following to require manually verifying the host key before first deploy.
# set :ssh_options, verify_host_key: :secure
