# config valid only for current version of Capistrano
lock '3.4.0'

#set :tmp_dir, "#{fetch(:home)}/tmp"
set :tmp_dir, "/home/stuartbrown/pickingorganic.org/tmp"

set :application, 'storyproject'
set :repo_url, 'git@github.com:jinky32/story-project.git'

# Default branch is :master
# ask :branch, `git rev-parse --abbrev-ref HEAD`.chomp

# Default deploy_to directory is /var/www/my_app_name
set :deploy_to, '/home/stuartbrown/pickingorganic.org'

# Default value for :scm is :git
set :scm, :git

# Default value for :format is :pretty
# set :format, :pretty

# Default value for :log_level is :debug
# set :log_level, :debug

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
set :linked_files, fetch(:linked_files, []).push('app/config/parameters.yml', 'web/.htaccess')


# Default value for linked_dirs is []
set :linked_dirs, fetch(:linked_dirs, []).push('vendor/bundle')

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for keep_releases is 5
# set :keep_releases, 5

#namespace :deploy do

 # after :restart, :clear_cache do
  #  on roles(:web), in: :groups, limit: 3, wait: 10 do
      # Here we can do anything such as:
      # within release_path do
      #   execute :rake, 'cache:clear'
      # end
   # end
  #end

#end

namespace :deploy do

    desc 'composer install'
    task :composer_install do
        on roles(:web) do
            within release_path do
                execute 'composer', 'install', '--no-dev', '--optimize-autoloader'
            end
        end
    end

    after :updated, 'deploy:composer_install'

    desc 'Restart application - does nothing, see comments below'
    task :restart do
        on roles(:app), in: :sequence, wait: 5 do
            # This is present b/c 'cap production deploy' is blowing up w/o it.
            # Not sure what's up with that, the Google hasn't helped, and I'm tired
            # of screwing with it.  It stays in for now.
        end
    end

end
