<?php

    class Person {

        public function __construct(public string $name) {}

        public function sayHello(string $name): string {
            return "Hello $name my Name is $this->name";
        }
    }

    $person = new Person("Alam");

    $reference = $person->sayHello(...);
    // $reference2 = str_contains(...);

    var_dump($reference("Bagas"));