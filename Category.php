<?php

    class Category {

        //Hanya bisa diubah sekali
        // public readonly string $id;
        // public readonly string $name;

        public function __construct(public readonly string $id, public readonly string $name)
        {
        }
    }

    $category = new Category("1", "Alam");
    var_dump($category);

    // $category->id = "3"; //Error ( Cannot modify readonly property )
    // $category->name = "Bagas"; // Error ( Cannot modify readonly property )
