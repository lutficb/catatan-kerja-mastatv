<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    //--------------------------------------------------------------------
    // Rules For Login
    //--------------------------------------------------------------------
    public $login = [
        'username' => [
            'label' => 'Auth.username',
            'rules' => [
                'required',
                'max_length[30]',
                'min_length[3]',
                'regex_match[/\A[a-zA-Z0-9\.]+\z/]',
            ],
        ],
        // 'email' => [
        //     'label' => 'Auth.email',
        //     'rules' => [
        //         'required',
        //         'max_length[254]',
        //         'valid_email'
        //     ],
        // ],
        'password' => [
            'label' => 'Auth.password',
            'rules' => [
                'required',
                'max_byte[72]',
            ],
            'errors' => [
                'max_byte' => 'Auth.errorPasswordTooLongBytes',
            ]
        ],
    ];

    //--------------------------------------------------------------------
    // Rules For Add New User
    //--------------------------------------------------------------------
    public $user_rules = [
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required|max_length[30]|is_unique[users.username]',
                'errors' => [
                    'required' => 'All accounts must have {field} provided',
                    'is_unique' => '{field} has been taken by another user',
                    'max_length' => 'Your {field} is too long.',
                ],
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|max_length[254]|valid_email',
                'errors' => [
                    'required' => 'All accounts must have {field} provided',
                    'valid_email' => 'Your {field} is not a valid email address',
                ],
            ],
            'name' => [
                'label'  => 'Name',
                'rules'  => 'required|max_length[30]',
                'errors' => [
                    'required' => 'All accounts must have {field} provided',
                ],
            ],
            'group' => [
                'label'  => 'Group',
                'rules'  => 'required',
            ],
        ];
}
