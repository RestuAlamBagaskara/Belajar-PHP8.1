<?php

    class Foo {
        final const XX = "foo";
    }

    class Bar extends Foo{
        // const XX = "bar"; //Error
    }

    var_dump(Bar::XX);