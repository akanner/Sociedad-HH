
composer dumpautoload
gulp
if [ "$1" = "-db" ]; then
  php  artisan migrate:refresh --seed 
fi

