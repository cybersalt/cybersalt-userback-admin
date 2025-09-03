<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.UserbackAdmin
 *
 * Injects Userback feedback widget into Joomla Administrator
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\CMSPlugin;

final class PlgSystemUserbackadmin extends CMSPlugin
{
    public function onBeforeCompileHead(): void
    {
        try {
            $app = Factory::getApplication();

            // Only in admin client
            if (!$app->isClient('administrator')) {
                return;
            }

            // Get document
            $doc = $app->getDocument();

            // Only inject if it's an HTML document
            if ($doc === null || $doc->getType() !== 'html') {
                return;
            }

            // Get Userback token
            $token = (string) $this->params->get('access_token', '');
            if ($token === '') {
                return;
            }

            // Add Userback script
            $script = <<<JS
                window.Userback = window.Userback || {};
                Userback.access_token = '{$token}';
                (function(d) {
                    var s = d.createElement('script'); s.async = true;
                    s.src = 'https://static.userback.io/widget/v1.js';
                    (d.head || d.body).appendChild(s);
                })(document);
            JS;

            $doc->addScriptDeclaration($script);

        } catch (\Throwable $e) {
            // Fail silently to prevent backend crash
        }
    }

    /**
     * Prevent enabling the plugin if no access token is set
     */
    public function onExtensionBeforeSave($context, $table, $isNew, $data): bool
    {
        // Only apply to this plugin
        if ($context !== 'com_plugins.plugin' || $table->element !== 'userbackadmin' || $table->folder !== 'system') {
            return true;
        }

        // Check if enabling
        $enabled = (int) ($data['enabled'] ?? $table->enabled ?? 0);

        // Get the access token being saved
        $params = $data['params'] ?? [];
        $token = $params['access_token'] ?? '';

        if ($enabled === 1 && trim($token) === '') {
            $app = Factory::getApplication();
            $app->enqueueMessage('Please enter a valid Userback access token before enabling the plugin.', 'error');
            return false; // block save
        }

        return true;
    }
}
