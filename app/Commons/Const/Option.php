<?php

namespace App\Commons\Const;

class Option
{
    const Gender = [
        [
            'value' => 'male',
            'text' => 'Laki-Laki'
        ],
        [
            'value' => 'female',
            'text' => 'Perempuan'
        ]
    ];

    const Citizenship = [
        [
            'value' => 'indonesia',
            'text' => 'Indonesia'
        ],
        [
            'value' => 'foreign',
            'text' => 'Warga Negara Asing'
        ]
    ];

    const Religion = [
        [
            'value' => 'islam',
            'text' => 'Islam'
        ],
        [
            'value' => 'kristen',
            'text' => 'Kristen'
        ],
        [
            'value' => 'katolik',
            'text' => 'Katolik'
        ],
        [
            'value' => 'hindu',
            'text' => 'Hindu'
        ],
        [
            'value' => 'budha',
            'text' => 'Budha'
        ],
        [
            'value' => 'konghucu',
            'text' => 'Konghucu'
        ],
        [
            'value' => 'other',
            'text' => 'Lainnya'
        ],
    ];

    const Marriage = [
        [
            'value' => 'not-marriage',
            'text' => 'Belum Kawin'
        ],
        [
            'value' => 'marriage',
            'text' => 'Kawin'
        ]
    ];
}
