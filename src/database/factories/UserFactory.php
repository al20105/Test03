<?php

namespace Database\Factories;

/*******************************************************************
*** File Name           : UserFactory.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Purpose             : ダミーデータの作成
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

/****************************************************************************
*** Function Name       : definition()
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Function            : ダミーデータを作成する
*** Return              : ダミーデータ
****************************************************************************/

    public function definition()
    {
        return
        [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ];
    }

/****************************************************************************
*** Function Name       : unverified()
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Function            : メールアドレスが未検証であることを示す
*** Return              : メールアドレスが未検証を示す変数が
                          格納されている配列
****************************************************************************/

    public function unverified()
    {
        return $this->state(function (array $attributes) // 属性
        {
            return
            [
                'email_verified_at' => null,
            ];
        });
    }
}
