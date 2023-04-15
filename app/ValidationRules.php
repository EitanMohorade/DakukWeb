<?php

namespace App;

class ValidationRules 
{
    public static function productRules() {
        return [
            'name' => 'required', //WITH: |alpha_num:ascii|min:3|max:255 THERE IS AN ERROR
            //'category_id' => ['required|numeric|gt:0'],
            'description' => 'required', //WITH: |alpha_num:ascii|min:3|max:1024 THERE IS AN ERROR
            'price' => 'required', //WITH |numeric|gt:0 THERE IS AN ERROR
            'stock' => 'required',
            'image' => 'required|image|dimensions:min_width=100,min_height=100'
        ];
    }

    public static function categoryRules() {
        return [
            'name' => 'required',
        ];
    }
}