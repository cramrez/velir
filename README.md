# Velir: Drupal Assessment

## Initial setup


```shell
# Get started.
ddev start
ddev composer install

# Install site from config.
ddev drush -y site:install --existing-config -v

# Create dummy content.
ddev drush dummy-content

# Clear cache
ddev drush cr

# Access to the site
ddev drush uli

# Tests.
mkdir -p web/sites/simpletest/browser_output
chmod -R 777 web/sites/simpletest

# Excecute Tests.
ddev exec ./vendor/bin/phpunit ./web/modules/custom/velir/tests/src/Functional/*
ddev exec ./vendor/bin/phpunit ./web/modules/custom/velir/tests/src/Kernel/* 

```

In phpunit.xml file make the following changes:

* Set the SIMPLETEST_BASE_URL variable to the URL of your site.
* Set the SIMPLETEST_DB variable to point to the URL of your Drupal database.


### Route to review the assessment.
1. https://velir.ddev.site/hello-velir-1
2. https://velir.ddev.site/hello-velir-2
3. https://velir.ddev.site/admin/config/system/settings-velir
4. https://velir.ddev.site/admin/structure/types/manage/article/display
5. https://velir.ddev.site/hello-velir-3
6. https://velir.ddev.site/      (# the block is displayed in the sidebar )
7. https://velir.ddev.site/hello-velir-view

### Question:

Q. Describe an instance when you would create a custom data entity versus use the Node entity.
What are some downsides when Node is used when it should not be?

A. You can use an entity when you want to save a log of calls to an external API. It saves some important fields such as user_id, call_url, and timestamp.

Some downsides could be:
Unnecessary complexity in terms of the number of tables and fields that aren't necessary.
Database overhead.
