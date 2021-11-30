<?php

use mstodulski\translator\Translator;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    private Translator $translator;
    
    public function setUp(): void
    {
        $this->translator = new Translator();
        $this->translator->defineTranslations(getTranslations());
    }

    public function testExistingTranslations()
    {
        $this->assertEquals('Options', $this->translator->translate('admin.options'));
        $this->assertEquals('Main page', $this->translator->translate('admin.mainPage'));
        $this->assertEquals('Edit customer', $this->translator->translate('admin.customer.edit'));
        $this->assertEquals('Create customer', $this->translator->translate('admin.customer.create'));
        $this->assertEquals('This is a customers edit/create', $this->translator->translate('admin.customer.edit_create'));
        $this->assertEquals('Back to customers list', $this->translator->translate('admin.customer.back_to_list'));
        $this->assertEquals('Option 1', $this->translator->translate('admin.customer.options.option1'));
        $this->assertEquals('Option 2', $this->translator->translate('admin.customer.options.option2'));
    }

    public function testNotExistingTranslations()
    {
        $this->assertEquals('admin.customer.options.option3', $this->translator->translate('admin.customer.options.option3'));
        $this->assertEquals('admin.customer.options.option4', $this->translator->translate('admin.customer.options.option4'));
    }

    public function testNotLastChainElement()
    {
        $this->assertEquals('admin.customer', $this->translator->translate('admin.customer'));
    }

}
