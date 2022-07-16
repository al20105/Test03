<?php

/*******************************************************************
*** File Name           : view.php
*** Version             : V1.0
*** Designer            : なし(デフォルトのファイル)
*** Date                : 2022.06.28
*** Purpose             : View Storage Pathsと
***                       Compiled View Pathの決定
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : なし(デフォルトのファイル), 2022.06.28
*/

return
[
    'paths' =>
    [
        resource_path( 'views' ),
    ],

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath( storage_path( 'framework/views' ) )
    ),

];
