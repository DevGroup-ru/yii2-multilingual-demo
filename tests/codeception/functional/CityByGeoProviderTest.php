<?php


class CityByGeoProviderTest extends \Codeception\TestCase\Test
{
    /**
     * @var \FunctionalTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testTambovCity()
    {
        $this->tester->wantTo('get City Tambov by Geo Data');
        $this->tester->setServerData('multilingual.dev'); //Мичуринск
        $this->tester->setMultilingualHandlers([
            [
                'class' => \DevGroup\Multilingual\DefaultGeoProvider::className(),
                'default' => [
                    'country' => [
                        'name' => 'Russia',
                        'iso' => 'ru',
                    ],
                    'city' => [
                        'name' => 'Tambov',
                        'iso' => null,
                        'lat' => 52.73169,
                        'lon' => 41.44326,
                    ]
                ]
            ],
        ]);

        $this->tester->amOnPage('/ru/');
        $this->tester->see('Tambov', '#select_geo_block .city');
        codecept_debug($this->tester->grabTextFrom('body'));
    }

    // tests
    public function testMichurinskCity()
    {
        $this->tester->wantTo('get City Michurinsk by Geo Data and Set Tambov');
        $this->tester->setServerData('multilingual.dev'); //Мичуринск
        $this->tester->setMultilingualHandlers([
            [
                'class' => \DevGroup\Multilingual\DefaultGeoProvider::className(),
                'default' => [
                    'country' => [
                        'name' => 'Russia',
                        'iso' => 'ru',
                    ],
                    'city' => [
                        'name' => 'Michurinsk',
                        'iso' => null,
                        'lat' => 52.8930342,
                        'lon' => 40.4980963,
                    ]
                ]
            ],
        ]);

        $this->tester->amOnPage('/ru/');
        $this->tester->see('Tambov', '#select_geo_block .city');
    }


    public function testGetCityByIp()
    {
        $this->tester->wantTo('get City Germany by ip address of Brandenburg, Germany');
        $this->tester->setServerData('multilingual.dev', '212.45.111.17'); //Brandenburg, Germany
        $this->tester->setMultilingualHandlers([
            [
                'class' => \DevGroup\Multilingual\SypexGeoDaemon\Provider::className(),
                'host' => 'api.sypexgeo.net',
                'port' => 80,
            ],
        ]);

        $this->tester->amOnPage('/ru/');
        $this->tester->see('Berlin', '#select_geo_block .city');
    }

}