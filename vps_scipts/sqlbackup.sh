#!/bin/bash

# source laravel .env values
source ~/.env

# function to check if command make error and send notification
function check_error {
    if [ $? -ne 0 ]; then
        curl -d "$1" ntfy.sh/cookmasters
        exit 1
    fi
}

# dump of database
mysqldump -u ${DB_USERNAME} -p"${DB_PASSWORD}" ${DB_DATABASE}>~/sqlbackup/${DB_DATABASE}_$(date +\%Y\%m\%d).sql
check_error "Dump database failed"

# upload to google drive
gdrive files upload --parent 1Z2Z2hf8bnyUGQM6wb6qQAOrEJy8P2Pjx ~/sqlbackup/${DB_DATABASE}_$(date +\%Y\%m\%d).sql
check_error "Upload to google drive failed"

# upload to mega
mega-put ~/sqlbackup/${DB_DATABASE}_$(date +\%Y\%m\%d).sql /sqlbackup_cookmasters
check_error "Upload to mega failed"

# send notification to success
curl -d "Backup database ${DB_DATABASE} success" ntfy.sh/cookmasters

