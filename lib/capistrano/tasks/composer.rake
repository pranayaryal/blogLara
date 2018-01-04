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
          execute "imagesDir=#{current_path}/public/images; if [ -d $imagesDir ] || [ -h $imagesDir ]; then cp -a $imagesDir #{release_path}/public/images; sudo chown -R doe:www-data #{release_path}/public/images; fi;"
      end
  end

  desc 'Chown images back to doe user before deploy cleanup'
  task :images_owner do
      on roles(:composer) do
          puts ("--> Chown images folder back to doe user")
          execute "sudo chown -R doe:doe #{current_path}/public/images"
      end
  end
end