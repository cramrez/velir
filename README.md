# Drupal Assessment

## Initial setup


```shell
# Get started.
ddev start
ddev composer install

# Install site from config.
ddev drush -y site:install --existing-config -v

# Access to the site
ddev drush uli

# Tests.
mkdir -p web/sites/simpletest/browser_output
chmod -R 777 web/sites/simpletest

```
