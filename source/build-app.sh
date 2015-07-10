
echo "Generating Autoload..."
composer dumpautoload
echo "Compiling css..."
gulp
if [ "$1" = "-db" ]; then
  echo "building database..."
  php  artisan migrate:refresh --seed
fi
