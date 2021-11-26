#!/bin/bash
for model in $(cat ./init/models.txt); do
    php artisan make:model ${model} -mrf
done
for model in $(cat ./init/models.txt); do
    php artisan make:resource ${model}Resource
done

