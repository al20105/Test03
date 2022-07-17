<?php

namespace Database\Factories;

/*******************************************************************
*** File Name           : UserFactory.php
*** Version             : V1.0
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Purpose             : ダミーデータ生成を行う
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルト), 2022.06.28
*/

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

/****************************************************************************
*** Function Name       : definition()
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : ダミーデータ定義を行う
*** Return              : アカウント情報
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
*** Designer            : なし(デフォルト)
*** Date                : 2022.06.28
*** Function            : メールアドレス認証がされていないことを定義する
*** Return              : メールアドレス認証の配列
****************************************************************************/

    public function unverified()
    {
        return $this->state(function ( array $attributes ) { // 属性の配列
            return
            [
                'email_verified_at' => null,
            ];
        });
    }
}
