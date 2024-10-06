<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;
use \App\Validation\MyCustomRules;

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
        MyCustomRules::class,
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

    //--------------------------------------------------------------------
    // Rules For Add New Catatan
    //--------------------------------------------------------------------
    public $catatan_rules = [
        'waktu_catatan' => [
            'label' => 'Tanggal Pekerjaan',
            'rules' => [
                'required',
                'dateValidation'
            ],
            'errors' => [
                'required' => '{field} harus dipilih sesuai tanggal pekerjaan dikerjakan.',
                'dateValidation' => '{field} maksimal hari ini. Esok hari masih belum terjadi.'
            ],
        ],
        'deskripsi_catatan' => [
            'label' => 'Detail Pekerjaan',
            'rules' => [
                'required',
                'min_length[20]'
            ],
            'errors' => [
                'required' => '{field} harus diisi sedetail mungkin.',
                'min_length' => '{field} yang anda jabarkan terlalu singkat.',
            ],
        ],
        'deskripsi_permasalahan' => [
            'label' => 'Permasalahan',
            'rules' => [
                'required',
            ],
            'errors' => [
                'required' => 'Kolom {field} harus diisi. Jika tidak ada permasalahan, isi dengan tanda -.'
            ],
        ],
        'deskripsi_solusi' => [
            'label' => 'Solusi',
            'rules' => [
                'required'
            ],
            'errors' => [
                'required' => 'Kolom {field} harus diisi. Jika tidak ada solusi karena tidak ada permasalahan, isi dengan tanda -.'
            ],
        ],
    ];

    //--------------------------------------------------------------------
    // Rules For Add New Jobdes
    //--------------------------------------------------------------------
    public $jobdes_rules = [
        'name' => [
            'label'  => 'Nama Jobdes',
            'rules'  => [
                'required',
                'max_length[30]',
            ],
            'errors' => [
                'required' => '{field} harus diisi',
                'max_length' => '{field} is too long.',
            ],
        ],
        'deskripsi' => [
            'label' => 'Deskripsi Jobdes',
            'rules' => [
                'required',
                'min_length[5]'
            ],
            'errors' => [
                'required' => '{field} harus diisi',
                'min_length' => '{field} terlalu singkat, belum dapat menggambarkan pekerjaan yang dimaksud',
            ],
        ],
    ];
}
