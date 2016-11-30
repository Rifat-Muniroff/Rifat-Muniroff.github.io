<?php
return [
    'guest' => [
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Guest',
        'bizRule' => null,
        'data' => null
    ],
    '0' => [
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'User',
        'children' => [
            'guest', // унаследуемся от гостя
        ],
    'bizRule' => null,
    'data' => null
    ],
    '1' => [
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Administrator',
        'children' => [
            '0',         // позволим админу всё, что позволено пользователю
        ],
        'bizRule' => null,
        'data' => null
    ],
];