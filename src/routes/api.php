<?php

/*******************************************************************
*** File Name           : api.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28 
*** Purpose             : アプリケーションのAPIルートを登録
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function ( Request $request ) // HTTPリクエスト
{
    return $request->user();
});
