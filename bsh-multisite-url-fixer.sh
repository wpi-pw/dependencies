#!/bin/bash

# WPI Multisite URL Fixer from roots.io for bedrock
# by DimaMinka (https://dima.mk)
# https://github.com/wpi-pw/app

composer config repositories.roots/multisite-url-fixer '{"type":"package","package": {"name": "roots/multisite-url-fixer","version": "dev-master","dist": {"url": "https://github.com/roots/multisite-url-fixer/archive/master.zip","type": "zip","reference": "master"}}}'
composer require roots/multisite-url-fixer:dev-master --update-no-dev --quiet
