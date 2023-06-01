#/bin/bash

#!/bin/bash

# Define color codes
RED='\033[0;31m'
GREEN='\033[0;32m'
NC='\033[0m' # No Color

# Update package lists and upgrade system
echo -e "${GREEN}Updating package lists...${NC}"
sudo pacman -Syu

# Install GCC compiler
if [[ $(command -v gcc) ]]; then
  echo -e "${GREEN}GCC compiler already installed.${NC}"
else
  echo -e "${GREEN}Installing GCC compiler...${NC}"
  sudo pacman -S gcc
fi

# Install pkg-config utility
if [[ $(command -v pkg-config) ]]; then
  echo -e "${GREEN}pkg-config already installed.${NC}"
else
  echo -e "${GREEN}Installing pkg-config utility...${NC}"
  sudo pacman -S pkgconf
fi

# Install GTK+3.0 library and development files
if [[ $(pkg-config --modversion gtk+-3.0) ]]; then
  echo -e "${GREEN}GTK+3.0 library already installed.${NC}"
else
  echo -e "${GREEN}Installing GTK+3.0 library and development files...${NC}"
  sudo pacman -S gtk3
fi

# Install cURL library and development files
if [[ $(pkg-config --modversion libcurl) ]]; then
  echo -e "${GREEN}cURL library already installed.${NC}"
else
  echo -e "${GREEN}Installing cURL library and development files...${NC}"
  sudo pacman -S curl
fi

# Install cJSON library and development files
if [[ $(pkg-config --modversion cjson) ]]; then
  echo -e "${GREEN}cJSON library already installed.${NC}"
else
  echo -e "${GREEN}Installing cJSON library and development files...${NC}"
  sudo pacman -S cJSON
fi

# Install libnotify-bin package and libnotify-dev package
if [[ $(command -v notify-send) && $(command -v pkg-config --exists libnotify) && $(pkg-config --exists libnotify) ]]; then
  echo -e "${GREEN}libnotify-bin and libnotify-dev packages already installed.${NC}"
else
  echo -e "${GREEN}Installing libnotify-bin and libnotify-dev packages...${NC}"
  sudo pacman -S libnotify
fi

# Install MySQL libraries
if [[ $(command -v mysql_config) ]]; then
  echo -e "${GREEN}MySQL libraries already installed.${NC}"
else
  echo -e "${GREEN}Installing MySQL libraries...${NC}"
  sudo pacman -S mariadb-libs
fi

# Print installation success message
echo -e "${GREEN}All dependencies installed successfully!${NC}"

