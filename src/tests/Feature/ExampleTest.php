<?php

namespace Tests\Feature;

/*******************************************************************
*** File Name           : ExampleTest.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Purpose             : Featureのテスト
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{

/****************************************************************************
*** Function Name       : test_the_application_returns_a_successful_response()
*** Designer            : なし(デフォルトのファイル)
*** Date			    : 2022.06.28
*** Function            : ベーシックなテスト例
*** Return              : なし
****************************************************************************/

    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
