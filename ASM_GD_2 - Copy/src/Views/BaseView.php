<?php

namespace App\Views;

abstract class BaseView{

    /**
     * Phương thức này dùng đẻ in ra giao diện
     */
    abstract public static function render();

    abstract public static function handle();




}