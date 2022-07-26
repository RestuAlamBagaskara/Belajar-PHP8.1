<?php

    interface sayHello {
        function sayHello(): string;
    }

    trait EnglishGender {
        function inEnglish(): string {
            return match($this) {
                Gender::Male => "Mr.",
                Gender::Female => "Mrs.",
            };
        }
    }
    //merepresentasikan nilai enum menjadi string
    //Mewarisi dari interface sayHello
    enum Gender: string implements sayHello{

        //Menggunakan Trait
        use EnglishGender;

        case Male = "Tuan ";
        case Female = "Nyonya ";

        const Unknown = "Unknown";

        static function fromEnglish(string $value):Gender {
            return match($value) {
                "Mr." => Gender::Male,
                "Mrs." => Gender::Female,
                default => throw new Exception("Value Tidak Didukung")
            };
        }

        function sayHello(): string {
            return "Hello" . $this->value;
        }
    }

    class Customer {

        public function __construct(public string $id, public string $name, public ?Gender $gender)
        {
        }
    }

    function sayHello(Customer $customer): string {
        if($customer->gender == null) {
            return "Hello  " . $customer->name;
        }
        else {
            return "Hello " . $customer->gender->value . $customer->name;
        }
    }


    var_dump(sayHello(new Customer('1', "Alam", Gender::Male)));
    var_dump(sayHello(new Customer('2', "Ratih", Gender::Female)));
    var_dump(sayHello(new Customer('3', "Raja", Gender::from("Tuan "))));
    var_dump(sayHello(new Customer('4', "Ratu", Gender::from("Nyonya "))));
    var_dump(sayHello(new Customer('4', "Ratu", Gender::tryFrom("Non-Biner"))));
    var_dump(Gender::cases());

    var_dump(Gender::Male->sayHello());
    var_dump(Gender::Female->sayHello());
    var_dump(Gender::Male->inEnglish());
    var_dump(Gender::Female->inEnglish());

    var_dump(Gender::fromEnglish("Mr."));
    var_dump(Gender::fromEnglish("Mrs."));
    // var_dump(Gender::fromEnglish("Him")); // Error

    var_dump(Gender::Unknown);