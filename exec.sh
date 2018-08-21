#!/bin/sh
dir=$(pwd)
cd $dir;
branch=$(git branch | grep \* | cut -d ' ' -f2)
php /home/www/htdocs/tools/trello-cli/exec.php $branch
