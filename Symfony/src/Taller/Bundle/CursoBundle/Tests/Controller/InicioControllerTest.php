<?php

namespace Taller\Bundle\CursoBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InicioControllerTest extends WebTestCase
{
    public function testInicio()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
    }

}
