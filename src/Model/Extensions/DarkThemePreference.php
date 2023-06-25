<?php

namespace Sunnysideup\CMSDarkTheme\Model\Extensions;

use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\OptionsetField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Security\Member;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\Requirements;

class DarkThemePreference extends DataExtension
{
    private static $db = [
        'DarkModeSetting' => 'Enum("Use browser setting, Dark, Light", "Use browser setting")',
    ];

    private static $field_labels = [
        'DarkModeSetting' => 'Preferred Display Mode for CMS',
    ];
    public function updateCMSFields(FieldList $fields)
    {
        $fieldLabels = $this->getOwner()->fieldLabels();
        $fields->addFieldsToTab(
            'Root.Cms',
            [
                OptionsetField::create(
                    'DarkModeSetting',
                    $fieldLabels['DarkModeSetting'] ?? self::$field_labels['DarkModeSetting'],
                    $this->getOwner()->dbObject('DarkModeSetting')->enumValues()
                )
                    ->setDescription('Using a dark mode may reduce your electricity use. Please reload browser window to see change.'),
            ]
        );
    }



}
