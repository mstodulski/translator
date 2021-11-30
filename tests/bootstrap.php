<?php
require_once 'vendor/autoload.php';

function getTranslations() : array
{
    $translations['admin']['options'] = 'Options';
    $translations['admin']['mainPage'] = 'Main page';
    $translations['admin']['customer']['edit'] = 'Edit customer';
    $translations['admin']['customer']['create'] = 'Create customer';
    $translations['admin']['customer']['edit_create'] = 'This is a customers edit/create';
    $translations['admin']['customer']['back_to_list'] = 'Back to customers list';
    $translations['admin']['customer']['list'] = 'Customers list';
    $translations['admin']['customer']['name'] = 'Name';
    $translations['admin']['customer']['birthDate'] = 'Birth date';
    $translations['admin']['customer']['list'] = 'Customers list';
    $translations['admin']['customer']['new'] = 'New customer';
    $translations['admin']['customer']['options']['option1'] = 'Option 1';
    $translations['admin']['customer']['options']['option2'] = 'Option 2';

    return $translations;
}