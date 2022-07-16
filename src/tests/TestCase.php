<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/*******************************************************************
*** File Name           : TestCase.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Purpose             : テストケース
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication; // 継承
}
