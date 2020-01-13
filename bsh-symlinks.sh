#!/bin/bash

# WPI Symlinks
# by DimaMinka (https://dima.mk)
# https://github.com/wpi-pw/app

# Get config files and put to array
wpi_confs=()
for ymls in wpi-config/*
do
  wpi_confs+=("$ymls")
done

# Get wpi-source for yml parsing, noroot, errors etc
source <(curl -s https://raw.githubusercontent.com/wpi-pw/template-workflow/master/wpi-source.sh)

wpi_dir_symlinks cache $(cur_env)
wpi_dir_symlinks languages $(cur_env)
wpi_dir_symlinks uploads $(cur_env)
wpi_dir_symlinks wp-rocket-config $(cur_env)
