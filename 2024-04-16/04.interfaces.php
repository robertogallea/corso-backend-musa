<?php

// INTERFACCE

interface Browsable
{
    public function browse();
}

class Book implements Browsable
{
    public function browse()
    {
        echo 'Sfoglio il libro' . "\n";
    }
}

class Magazine implements Browsable
{
    public function browse()
    {
        echo 'Sfoglio la rivista' . "\n";
    }
}

$book1 = new Book();
$book1->browse();

$magazine = new Magazine();
$magazine->browse();


interface Writable
{
    public function write(string $text);
}

class Notebook implements Browsable, Writable
{
    public function browse()
    {
        echo "Sfoglio il notebook\n";
    }

    public function write(string $text)
    {
        echo "Scrivo $text sul notebook";
    }

}

$notebook1 = new Notebook;
$notebook1->browse();
$notebook1->write('testo di prova');