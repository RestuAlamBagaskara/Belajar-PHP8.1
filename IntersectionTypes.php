<?php

    interface hasBrand {
        function getBrand(): string;
    }

    interface hasName {
        function getName(): string;
    }

    class Car implements hasName, hasBrand {

        private string $brand;
        private string $name;

        public function __construct(string $brand, string $name)
        {
            $this->brand = $brand;
            $this->name = $name;
        }

        public function getBrand(): string
        {
            return $this->brand;
        }
        
        public function getName(): string
        {
            return $this->name;   
        }
    }

    function printBrandAndName(hasBrand & hasName $value) {
        echo $value->getBrand() . "-" . $value->getName() . PHP_EOL;
    }

    printBrandAndName(new Car("Toyota", "Avanza"));
    printBrandAndName(new Car("Honda", "jazz"));