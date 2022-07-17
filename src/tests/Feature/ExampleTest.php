<?php

namespace Tests\Feature;

/*******************************************************************
*** File Name           : ExampleTest.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : Featureのテスト設定
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{

/****************************************************************************
*** Function Name       : test_the_application_returns_a_successful_response()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : レスポンス設定
*** Return              : なし
****************************************************************************/

    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
