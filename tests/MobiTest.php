<?php

use Kiwilan\Ebook\Ebook;
use Kiwilan\Ebook\Formats\Mobi\Parser\ExthHeader;
use Kiwilan\Ebook\Formats\Mobi\Parser\MobiExthRecord;
use Kiwilan\Ebook\Formats\Mobi\Parser\MobiHeader;
use Kiwilan\Ebook\Formats\Mobi\Parser\MobiParser;
use Kiwilan\Ebook\Formats\Mobi\Parser\PalmDOCHeader;

it('can parse mobi', function () {
    $ebook = Ebook::read(FORMAT_MOBI);

    expect($ebook->getTitle())->toBe("Alice's Adventures in Wonderland");
    expect($ebook->getAuthors()[0]->getName())->toBe('Lewis Carroll');
    expect($ebook->getAuthors()[1]->getName())->toBe('Tim Burton');
    expect($ebook->getDescription())->toBeString();
    expect($ebook->getPublisher())->toBeString();
    expect($ebook->getIdentifiers()[0]->getValue())->toBe('9780194229647');
    expect($ebook->getPublishDate())->toBeInstanceOf(DateTime::class);
    expect($ebook->getLanguage())->toBe('en');
    expect($ebook->getTags()[0])->toBe('Fictions');
});

it('can use mobi parser', function () {
    $parser = MobiParser::make(FORMAT_MOBI);

    expect($parser->getPalmDOCHeader())->toBeInstanceOf(PalmDOCHeader::class);
    expect($parser->getMobiHeader())->toBeInstanceOf(MobiHeader::class);
    expect($parser->getExthHeader())->toBeInstanceOf(ExthHeader::class);
    expect($parser->getRecords())->toBeArray();
    expect($parser->getError())->toBeString();

    // expect($parser->docHeader()->compression())->toBe(2);
    // expect($parser->docHeader()->textLength())->toBe(230241);
    // expect($parser->docHeader()->recordSize())->toBe(4096);
    // expect($parser->docHeader()->records())->toBe(57);

    // expect($parser->mobiHeader()->length())->toBe(232);
    // expect($parser->mobiHeader()->type())->toBe(2);
    // expect($parser->mobiHeader()->encoding())->toBe(65001);
    // expect($parser->mobiHeader()->id())->toBe(1542928680);
    // expect($parser->mobiHeader()->fileVersion())->toBe(0);

    // expect($parser->exthHeader()->length())->toBe(915);
    // expect($parser->exthHeader()->records())->toBeArray();

    // expect($parser->records()[0])->toBeInstanceOf(MobiExthRecord::class);
});

it('can use mobi reader', function () {
    $reader = MobiParser::make(FORMAT_MOBI)->reader();

    expect($reader->authors())->toBeArray();
    expect($reader->publisher())->toBeString();
    expect($reader->imprint())->toBeNull();
    expect($reader->description())->toBeString();
    expect($reader->isbns())->toBeArray();
    expect($reader->subjects())->toBeArray();
    expect($reader->publishingDate())->toBeString();
    expect($reader->review())->toBeNull();
    expect($reader->contributor())->toBeString();
    expect($reader->rights())->toBeNull();
    expect($reader->subjectCode())->toBeNull();
    expect($reader->type())->toBeNull();
    expect($reader->source())->toBeString();
    expect($reader->asin())->toBeString();
    expect($reader->version())->toBeNull();
    expect($reader->sample())->toBeNull();
    expect($reader->startReading())->toBeString();
    expect($reader->adult())->toBeNull();
    expect($reader->retailPrice())->toBeNull();
    expect($reader->retailCurrency())->toBeNull();
    expect($reader->Kf8Boundary())->toBeNull();
    expect($reader->fixedLayout())->toBeNull();
    expect($reader->bookType())->toBeNull();
    expect($reader->orientationLock())->toBeNull();
    expect($reader->originalResolution())->toBeNull();
    expect($reader->zeroGutter())->toBeNull();
    expect($reader->zeroMargin())->toBeNull();
    expect($reader->metadataResourceUri())->toBeString();
    expect($reader->unknown131())->toBeString();
    expect($reader->unknown132())->toBeNull();
    expect($reader->dictionaryShortName())->toBeNull();
    expect($reader->coverOffset())->toBeString();
    expect($reader->thumbOffset())->toBeString();
    expect($reader->hasFakeCover())->toBeString();
    expect($reader->creatorSoftware())->toBeString();
    expect($reader->creatorMajorVersion())->toBeString();
    expect($reader->creatorMinorVersion())->toBeString();
    expect($reader->creatorBuildNumber())->toBeString();
    expect($reader->watermark())->toBeNull();
    expect($reader->tamperProofKeys())->toBeNull();
    expect($reader->fontSignature())->toBeNull();
    expect($reader->clippingLimit())->toBeNull();
    expect($reader->publisherLimit())->toBeNull();
    expect($reader->unknown403())->toBeNull();
    expect($reader->textToSpeechFlag())->toBeNull();
    expect($reader->unknown405())->toBeNull();
    expect($reader->rentExpirationDate())->toBeNull();
    expect($reader->unknown407())->toBeNull();
    expect($reader->unknown450())->toBeNull();
    expect($reader->unknown451())->toBeNull();
    expect($reader->unknown452())->toBeNull();
    expect($reader->unknown453())->toBeNull();
    expect($reader->cdeContentType())->toBeString();
    expect($reader->lastUpdateTime())->toBeNull();
    expect($reader->updatedTitle())->toBeString();
    expect($reader->asin504())->toBeNull();
    expect($reader->language())->toBeString();
    expect($reader->writingMode())->toBeNull();
    expect($reader->creatorBuildNumber535())->toBeNull();
    expect($reader->unknown536())->toBeNull();
    expect($reader->unknown542())->toBeNull();
    expect($reader->inMemory())->toBeNull();
    expect($reader->extra())->toBeArray();
});
