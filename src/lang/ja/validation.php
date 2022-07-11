<!--
/*******************************************************************
*** File Name           : validation.php
*** Version             : V1.0
*** Designer            : 里田 侑声
*** Date                : 2022.06.28
*** Purpose             : バリデーション実施後のエラーMを設定する。
***
*******************************************************************/
/*
*** Revision :
*** V1.0 : 里田 侑声, 2022.06.28
*/
-->

<?php

return
[
    'accepted' => ':attributeを受け付ける必要があります。',
    'accepted_if' => ':otherが:valueのとき、:attributeを受け入れる必要があります。',
    'active_url' => ':attributeが有効なURLではありません。',
    'after' => ':attributeは:dateのあとに日付を指定する必要があります。',
    'after_or_equal' => ':attributeは:dateと等しいか、それ以降の日付の必要があります。      s',
    'alpha' => ':attributeには、文字のみを含めることが出来ます。',
    'alpha_dash' => ':attributeには、文字、数字、ダッシュ、アンダースコアのみを含めることができます。',
    'alpha_num' => ':attributeには、文字と数字のみを含めることができます。',
    'array' => ':attributeは配列である必要があります。',
    'before' => ':attributeは:dateよりも前の日付である必要があります。',
    'before_or_equal' => ':attributeは:dateよりも前の日付、または等しい日付である必要があります。',

    'between' =>
    [
        'array'   => ':attributeは:min以上:max以下の項目を保持する必要があります。',
        'file'    => ':attributeは:min～:max KBである必要があります。',
        'numeric' => ':attributeは:min以上:max以下である必要があります。',
        'string'  => ':attributeは:min文字以上:max文字以下である必要があります。',
    ],

    'boolean' => ':attributeフィールドはtrueまたはfalseである必要があります。',
    'confirmed' => ':attributeが一致しません。',
    'current_password' => 'パスワードが正しくありません。',
    'date' => ':attributeが有効な日付ではありません。',
    'date_equals' => ':attributeは:dateと等しい日付である必要があります。',
    'date_format' => ':attributeが:formatと一致しません。',
    'declined' => ':attributeを辞退する必要があります。',
    'declined_if' => ':otherが:valueの場合、:attributeを辞退しなければなりません。',
    'different' => ':attributeと:otherは異なっている必要があります。',
    'digits' => ':attributeは:digitsである必要があります。',
    'digits_between' => ':attributeは:min～:maxの桁数である必要があります。',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => ':attributeに重複した値があります。',
    'email' => ':attributeは有効なメールアドレスにする必要があります。',
    'ends_with' => ':attributeの末尾には、以下のいずれかをつける必要があります。: :values.',
    'enum' => '選択された:attributeは無効です。',
    'exists' => '選択された:attributeは無効です。',
    'file' => ':attributeはファイルである必要があります。',
    'filled' => ':attributeフィールドは値を持っている必要があります。',

    'gt' =>
    [
        'array'   => ':attributeは:valueより多い項目を持つ必要があります。',
        'file'    => ':attributeは:max KBより大きい必要があります。',
        'numeric' => ':attributeは:maxより大きい必要があります。',
        'string'  => ':attributeは:value文字より多い必要があります。',
    ],

    'gte' =>
    [
        'array'   => ':attributeは:value以上の項目を持つ必要があります。',
        'file'    => ':attributeは:value KB以上の必要があります。',
        'numeric' => ':attributeは:value以上の必要があります。',
        'string'  => ':attributeは:value文字以上の必要があります。',
    ],

    'image' => 'The :attribute must be an image.',
    'in' => '選択された:attributeは無効です。',
    'in_array' => ':attributeは:otherに存在しません。',
    'integer' => ':attributeは整数値の必要があります。',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',

    'lt' =>
    [
        'array'   => ':attributeは:valueより少ない項目を持つ必要があります。',
        'file'    => ':attributeは:value KBより小さい必要があります。',
        'numeric' => ':attributeは:valueより小さい必要があります。',
        'string'  => ':attributeは:value文字より小さい必要があります。',
    ],

    'lte' =>
    [
        'array'   => ':attributeは:value以上の項目を持つことは出来ません。',
        'file'    => ':attributeは:value KB以下の必要があります。',
        'numeric' => ':attributeは:value以下の必要があります。',
        'string'  => ':attributeは:value以下の必要があります。',
    ],

    'mac_address' => 'The :attribute must be a valid MAC address.',
<<<<<<< HEAD

    'max' =>
    [
        'array'   => ':attributeは:max未満の項目が必要です。',
        'file'    => ':attributeは:value KB未満の必要があります。',
        'numeric' => ':attributeは:max未満の必要があります。',
        'string'  => ':attributeは:max未満の必要があります。',
=======
    'max' => [
        'array' => ':attributeは:max以下の項目が必要です。',
        'file' => ':attributeは:value KB以下の必要があります。',
        'numeric' => ':attributeは:max以下の必要があります。',
        'string' => ':attributeは:max文字以下にする必要があります。',
>>>>>>> a936ae945ee919d91354b16747614053170e6497
    ],

    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',

    'min' =>
    [
        'array' => ':attributeは:min以上の項目が必要です。',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'numeric' => ':attributeは:min以上の必要があります。',
        'string' => ':attributeは:min文字以上の必要があります。',
    ],

    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => '選択された:attributeは無効です。',
    'not_regex' => ':attributeの形式が無効です。',
    'numeric' => ':attributeは数字の必要があります。',

    'password' =>
    [
        'letters' => 'attributeは少なくとも一つの文字を含まれている必要があります。',
        'mixed' => 'attributeは少なくとも一つの大文字と小文字を含めてください。',
        'numbers' => 'attributeは少なくとも一つの数字を含める必要があります。',
        'symbols' => 'attributeは少なくとも一つの記号を含める必要があります。',
        'uncompromised' => '入力された:attributeはすでに使用されています。別の:attributeを入力してください。',
    ],

    'present' => ':attributeが存在する必要があります。',
    'prohibited' => ':attributeは使用禁止です。',
    'prohibited_if' => ':otherが:valueの場合、:attributeは禁止となります。',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => ':attributeでは:otherを禁止しています。',
    'regex' => ':attributeの形式が無効です。',
    'required' => ':attributeは必須項目です。',
    'required_array_keys' => ':attributeには以下を含める必要があります。: :values',
    'required_if' => ':otherが:valueの場合、:attributeフィールドが必要になります。',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => ':attributeと:otherは一致する必要があります。',

    'size' =>
    [
        'array'   => 'The :attribute must contain :size items.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'numeric' => 'The :attribute must be :size.',
        'string'  => 'The :attribute must be :size characters.',
    ],

    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => ':attributeは文字列である必要があります。',
    'timezone' => ':attributeは有効な時刻である必要があります。',
    'unique' => ':attributeはすでに取得済みです。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

    'custom' =>
    [
        'attribute-name' =>
        [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' =>
    [
        'name'         => '名前',
        'email'        => 'メールアドレス',
        'password'     => 'パスワード',
        'comfirm_pass' => '確認用パスワード',
    ],

];
