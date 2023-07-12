#!/bin/bash

# Define color codes
RED='\033[0;31m'
GREEN='\033[0;32m'
NC='\033[0m' # No Color

# Update package lists and upgrade system
if [[ $(command -v apt-get) ]]; then
  echo -e "${GREEN}Updating package lists...${NC}"
  sudo apt-get update && sudo apt-get upgrade
elif [[ $(command -v dnf) ]]; then
  echo -e "${GREEN}Updating package lists...${NC}"
  sudo dnf update
elif [[ $(command -v yum) ]]; then
  echo -e "${GREEN}Updating package lists...${NC}"
  sudo yum update
else
  echo -e "${RED}Unsupported package manager. Please update your system manually.${NC}"
fi

# Install GCC compiler
if [[ $(command -v gcc) ]]; then
  echo -e "${GREEN}GCC compiler already installed.${NC}"
else
  if [[ $(command -v apt-get) ]]; then
    echo -e "${GREEN}Installing GCC compiler...${NC}"
    sudo apt-get install gcc
  elif [[ $(command -v dnf) ]]; then
    echo -e "${GREEN}Installing GCC compiler...${NC}"
    sudo dnf install gcc
  elif [[ $(command -v yum) ]]; then
    echo -e "${GREEN}Installing GCC compiler...${NC}"
    sudo yum install gcc
  else
    echo -e "${RED}Unsupported package manager. Please install GCC manually.${NC}"
  fi
fi

# Install pkg-config utility
if [[ $(command -v pkg-config) ]]; then
  echo -e "${GREEN}pkg-config already installed.${NC}"
else
  if [[ $(command -v apt-get) ]]; then
    echo -e "${GREEN}Installing pkg-config utility...${NC}"
    sudo apt-get install pkg-config
  elif [[ $(command -v dnf) ]]; then
    echo -e "${GREEN}Installing pkg-config utility...${NC}"
    sudo dnf install pkgconfig
  elif [[ $(command -v yum) ]]; then
    echo -e "${GREEN}Installing pkg-config utility...${NC}"
    sudo yum install pkgconfig
  else
    echo -e "${RED}Unsupported package manager. Please install pkg-config manually.${NC}"
  fi
fi

# Install GTK+3.0 library and development files
if [[ $(pkg-config --modversion gtk+-3.0) ]]; then
  echo -e "${GREEN}GTK+3.0 library already installed.${NC}"
else
  if [[ $(command -v apt-get) ]]; then
    echo -e "${GREEN}Installing GTK+3.0 library and development files...${NC}"
    sudo apt-get install libgtk-3-dev
  elif [[ $(command -v dnf) ]]; then
    echo -e "${GREEN}Installing GTK+3.0 library and development files...${NC}"
    sudo dnf install gtk3-devel
  elif [[ $(command -v yum) ]]; then
    echo -e "${GREEN}Installing GTK+3.0 library and development files...${NC}"
    sudo yum install gtk3-devel
  else
    echo -e "${RED}Unsupported package manager. Please install GTK+3.0 manually.${NC}"
  fi
fi

# Install cURL library and development files
if [[ $(pkg-config --modversion libcurl) ]]; then
  echo -e "${GREEN}cURL library already installed.${NC}"
else
  if [[ $(command -v apt-get) ]]; then
    echo -e "${GREEN}Installing cURL library and development files...${NC}"
    sudo apt-get install libcurl4-openssl-dev
  elif [[ $(command -v dnf) ]]; then
    echo -e "${GREEN}Installing cURL library and development files...${NC}"
    sudo dnf install libcurl-devel
  elif [[ $(command -v yum) ]]; then
    echo -e "${GREEN}Installing cURL library and development files...${NC}"
    sudo yum install libcurl-devel
  else
    echo -e "${RED}Unsupported package manager. Please install cURL manually.${NC}"
  fi
fi

# Install cJSON library and development files
if [[ $(pkg-config --modversion cjson) ]]; then
  echo -e "${GREEN}cJSON library already installed.${NC}"
else
  if [[ $(command -v apt-get) ]]; then
    echo -e "${GREEN}Installing cJSON library and development files...${NC}"
    sudo apt-get install libcjson-dev
  elif [[ $(command -v dnf) ]]; then
    echo -e "${GREEN}Installing cJSON library and development files...${NC}"
    sudo dnf install cJSON-devel
  elif [[ $(command -v yum) ]]; then
    echo -e "${GREEN}Installing cJSON library and development files...${NC}"
    sudo yum install cJSON-devel
  else
    echo -e "${RED}Unsupported package manager. Please install cJSON manually.${NC}"
  fi
fi

# Install libnotify-bin package and libnotify-dev package
if [[ $(command -v notify-send) && $(command -v pkg-config --exists libnotify) && $(pkg-config --exists libnotify) ]]; then
  echo -e "${GREEN}libnotify-bin and libnotify-dev packages already installed.${NC}"
else
  if [[ $(command -v apt-get) ]]; then
    echo -e "${GREEN}Installing libnotify-bin and libnotify-dev packages...${NC}"
    sudo apt-get install libnotify-bin libnotify-dev
  elif [[ $(command -v dnf) ]]; then
    echo -e "${GREEN}Installing libnotify-bin and libnotify-dev packages...${NC}"
    sudo dnf install libnotify-bin libnotify-dev
  elif [[ $(command -v yum) ]]; then
    echo -e "${GREEN}Installing libnotify-bin and libnotify-dev packages...${NC}"
    sudo yum install libnotify-bin libnotify-dev
  else
    echo -e "${RED}Unsupported package manager. Please install libnotify-bin and libnotify-dev manually.${NC}"
  fi
fi

# Install MySQL libraries
if [[ $(command -v mysql_config) ]]; then
  echo -e "${GREEN}MySQL libraries already installed.${NC}"
else
  if [[ $(command -v apt-get) ]]; then
    echo -e "${GREEN}Installing MySQL libraries...${NC}"
    sudo apt-get install libmysqlclient-dev
  elif [[ $(command -v dnf) ]]; then
    echo -e "${GREEN}Installing MySQL libraries...${NC}"
    sudo dnf install mysql-devel
  elif [[ $(command -v yum) ]]; then
    echo -e "${GREEN}Installing MySQL libraries...${NC}"
    sudo yum install mysql-devel
  else
    echo -e "${RED}Unsupported package manager. Please install MySQL libraries manually.${NC}"
  fi
fi
# Install Jansson library and development files
if [[ $(pkg-config --modversion jansson) ]]; then
  echo -e "${GREEN}Jansson library already installed.${NC}"
else
  if [[ $(command -v apt-get) ]]; then
    echo -e "${GREEN}Installing Jansson library and development files...${NC}"
    sudo apt-get install libjansson-dev
  elif [[ $(command -v dnf) ]]; then
    echo -e "${GREEN}Installing Jansson library and development files...${NC}"
    sudo dnf install jansson-devel
  elif [[ $(command -v yum) ]]; then
    echo -e "${GREEN}Installing Jansson library and development files...${NC}"
    sudo yum install jansson-devel
  else
    echo -e "${RED}Unsupported package manager. Please install Jansson manually.${NC}"
  fi
fi

# Print installation success message
echo -e "${GREEN}All dependencies installed successfully!${NC}"
