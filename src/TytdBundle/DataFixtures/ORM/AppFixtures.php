<?php
namespace TytdBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

class AppFixtures extends DataFixtureLoader
{

    protected function getFixtures()
    {
        return array(
            __DIR__ . '/article.yml',
        );
    }
}