<?php

/**
 * @group Smoke
 */
class SmokeTestCest
{
    public function pluginIsVisibleToWordPress(WpunitTester $I): void
    {
        $plugins = get_option('active_plugins', []);
        $I->assertIsArray($plugins);
    }
}