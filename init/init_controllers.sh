#!/bin/bash
cat ./init/controllers.txt | while read line
do
    php artisan make:controller ${line} --resource --api
   echo $line
done