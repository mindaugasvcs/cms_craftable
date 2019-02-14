<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => "ID",
            'activated' => "Activated",
            'email' => "Email",
            'first_name' => "First name",
            'forbidden' => "Forbidden",
            'language' => "Language",
            'last_name' => "Last name",
            'password' => "Password",
            'password_repeat' => "Password Confirmation",
                
            //Belongs to many relations
            'roles' => "Roles",
                
        ],
    ],

    'brand' => [
        'title' => 'Brands',

        'actions' => [
            'index' => 'Brands',
            'create' => 'New Brand',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'name' => "Name",
            
        ],
    ],

    'product' => [
        'title' => 'Products',

        'actions' => [
            'index' => 'Products',
            'create' => 'New Product',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'brand_id' => "Brand",
            'sku' => "Sku",
            'name' => "Name",
            'msrp' => "Msrp",
            'price' => "Price",
            'wholesale_price' => "Wholesale price",
            'discount_available' => "Discount available",
            'discount' => "Discount",
            'enabled' => "Enabled",
            'available_date' => "Available date",
            'units_in_stock' => "Units in stock",
            'units_on_order' => "Units on order",
            'minimal_quantity' => "Minimal quantity",
            'width' => "Width",
            'height' => "Height",
            'depth' => "Depth",
            'weight' => "Weight",
            'description' => "Description",
            'images' => "Images",
            'note' => "Note",
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];