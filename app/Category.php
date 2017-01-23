<?php

namespace Acada;

class Category
{
    public static function getCategories()
    {
        return config('app.categories');
    }
}
