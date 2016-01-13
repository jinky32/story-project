set :stage, :staging

role :web, %w{stuartbrown@stuartbrown.name}
role :app, %w{stuartbrown@stuartbrown.name}

set :ssh_options, {
    forward_agent: true
}
# added as per http://stackoverflow.com/questions/27809597/how-to-deploy-in-debug-mode-a-symfony2-app-with-capifony
set :composer_options,  "--dev --verbose --prefer-dist
--optimize-autoloader --no-progress"
set :clear_controllers, false


# Symfony environment
set :symfony_env,  "dev"

# Symfony application path
set :app_path,              "app"

# Symfony web path
set :web_path,              "web"

# Symfony log path
set :log_path,              fetch(:app_path) + "/logs"

# Symfony cache path
set :cache_path,            fetch(:app_path) + "/cache"

# Symfony config file path
set :app_config_path,       fetch(:app_path) + "/config"

# Controllers to clear
set :controllers_to_clear, ["app_*.php"]

# Files that need to remain the same between deploys
#set :linked_files,          []

# Dirs that need to remain the same between deploys (shared dirs)
set :linked_dirs,           [fetch(:log_path), fetch(:web_path) + "/uploads"]

# Dirs that need to be writable by the HTTP Server (i.e. cache, log dirs)
set :file_permissions_paths,         [fetch(:log_path), fetch(:cache_path)]

# Name used by the Web Server (i.e. www-data for Apache)
set :file_permissions_users, ['www-data']

# Name used by the Web Server (i.e. www-data for Apache)
set :webserver_user,        "www-data"

# Method used to set permissions (:chmod, :acl, or :chgrp)
set :permission_method,     false

# Execute set permissions
set :use_set_permissions,   false

# Symfony console path
set :symfony_console_path, fetch(:app_path) + "/console"

# Symfony console flags
set :symfony_console_flags, "--no-debug"

# Assets install path
set :assets_install_path,   fetch(:web_path)

# Assets install flags
set :assets_install_flags,  '--symlink'

# Assetic dump flags
set :assetic_dump_flags,  ''

fetch(:default_env).merge!(symfony_env: fetch(:symfony_env))

# server-based syntax
# ======================
# Defines a single server with a list of roles and multiple properties.
# You can define all roles on a single server, or split them:

# server 'example.com', user: 'deploy', roles: %w{app db web},
my_property: :my_value
# server 'example.com', user: 'deploy', roles: %w{app web},
other_property: :other_value
# server 'db.example.com', user: 'deploy', roles: %w{db}