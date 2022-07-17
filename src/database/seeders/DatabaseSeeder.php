<?php

namespace Database\Seeders;

/*******************************************************************
*** File Name           : DatabaseSeeder.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : シーダーファイル
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

/****************************************************************************
*** Function Name       : run()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : データベースをシードする
*** Return              : なし
****************************************************************************/

    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
