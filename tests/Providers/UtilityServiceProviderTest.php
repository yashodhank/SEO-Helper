<?php namespace Arcanedev\SeoHelper\Tests\Providers;

use Arcanedev\SeoHelper\Providers\UtilityServiceProvider;
use Arcanedev\SeoHelper\Tests\TestCase;

/**
 * Class     UtilityServiceProviderTest
 *
 * @package  Arcanedev\SeoHelper\Tests\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class UtilityServiceProviderTest extends TestCase
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /** @var UtilityServiceProvider */
    private $provider;

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    public function setUp()
    {
        parent::setUp();

        $this->provider = $this->app->getProvider(UtilityServiceProvider::class);
    }

    public function tearDown()
    {
        unset($this->provider);

        parent::tearDown();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Test Functions
     | ------------------------------------------------------------------------------------------------
     */
    /** @test */
    public function it_can_be_instantiated()
    {
        $expectations = [
            \Arcanedev\SeoHelper\Providers\UtilityServiceProvider::class,
            \Arcanedev\Support\ServiceProvider::class,
            \Illuminate\Support\ServiceProvider::class,
        ];

        foreach ($expectations as $expected) {
            $this->assertInstanceOf($expected, $this->provider);
        }
    }

    /** @test */
    public function it_can_provides()
    {
        $expected = [
            'arcanedev.seo-helper.meta',
            'arcanedev.seo-helper.open-graph',
            'arcanedev.seo-helper.twitter',
            \Arcanedev\SeoHelper\Contracts\SeoMeta::class,
            \Arcanedev\SeoHelper\Contracts\SeoOpenGraph::class,
            \Arcanedev\SeoHelper\Contracts\SeoTwitter::class,
        ];

        $this->assertEquals($expected, $this->provider->provides());
    }
}
