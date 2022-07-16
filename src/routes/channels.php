<?php

/*******************************************************************
*** File Name           : channels.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28 
*** Purpose             : ブロードキャストチャンネルを登録
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ( $user, // アカウント情報
                                                      $id) // アカウントID
{
    return (int) $user->id === (int) $id;
});
