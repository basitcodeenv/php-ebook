<?php

use Kiwilan\Ebook\Ebook;

it('can parse pdf', function () {
    $ebook = Ebook::read(PDF);
    $book = $ebook->book();
    $firstAuthor = $book->authors()[0];

    expect($ebook->path())->toBe(PDF);

    expect($book)->toBeInstanceOf(Kiwilan\Ebook\BookEntity::class);
    expect($book->title())->toBe('Example PDF');
    expect($book->authors())->toBeArray();
    expect($firstAuthor->name())->toBe('Ewilan Rivière');
    expect($book->description())->toBeString();
    expect($book->publisher())->toBe('Kiwilan');
    expect($book->date())->toBeInstanceOf(DateTime::class);
    expect($book->date()->format('Y-m-d H:i:s'))->toBe('2023-03-21 07:44:27');
    expect($book->tags())->toBeArray();
    expect($book->pageCount())->toBe(4);
});

it('can extract pdf cover', function () {
    $ebook = Kiwilan\Ebook\Ebook::read(PDF);

    $path = 'tests/output/cover-PDF.jpg';
    file_put_contents($path, $ebook->cover());

    expect($ebook->cover())->toBeString();
    expect(file_exists($path))->toBeTrue();
    expect($path)->toBeReadableFile();
})->skip(PHP_OS_FAMILY === 'Windows', 'Skip on Windows');
