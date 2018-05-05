<?php
/**
 * Width Fieldtype plugin for Craft CMS 3.x.
 *
 * Brings back the Width fieldtype from Craft 2
 *
 * @link      https://rias.be
 *
 * @copyright Copyright (c) 2017 Rias
 */

namespace rias\widthfieldtype;

use Craft;
use craft\base\Plugin;
use craft\events\RegisterComponentTypesEvent;
use craft\services\Fields;
use craft\services\Plugins;
use rias\widthfieldtype\fields\Width as WidthField;
use rias\widthfieldtype\twig\WidthAsPercentExtension;
use yii\base\Event;

/**
 * Craft plugins are very much like little applications in and of themselves. We’ve made
 * it as simple as we can, but the training wheels are off. A little prior knowledge is
 * going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL,
 * as well as some semi-advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
 *
 * @author    Rias
 *
 * @since     1.0.0
 */
class WidthFieldtype extends Plugin
{
    // Public Methods
    // =========================================================================

    /* @inheritdoc */
    public function init()
    {
        parent::init();

        // Register our field
        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = WidthField::class;
            }
		);

		Craft::$app->view->registerTwigExtension(new WidthAsPercentExtension);
    }
}
