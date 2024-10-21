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

    //--------------------------------------------------------------------
    // Rules For Add New Informasi
    //---------------------------------------------------------------------
    public $pribadi_rules = [
        'tempat_lahir' => [
            'label' => 'Kota/ Kabupaten Tempat Lahir',
            'rules' => [
                'required',
                'min_length[3]',
                'max_length[100]'
            ],
            'errors' => [
                'required' => '{field} harus diisi',
                'min_length' => '{field} terlalu pendek. Tidak ada kota/Kabupaten di Indonesia yang namanya kurang dari 3 karakter',
                'max_length' => '{field} terlalu panjang. Tidak ada kota/Kabupaten di Indonesia yang namanya lebih dari 100 karakter'
            ],
        ],
        'tanggal_lahir' => [
            'label' => 'Tanggal Lahir',
            'rules' => [
                'required',
            ],
            'errors' => [
                'required' => '{field} harus diisi'
            ],
        ],
        'alamat' => [
            'label' => 'Alamat Domisili',
            'rules' => [
                'required',
                'min_length[5]',
                'max_length[150]',
            ],
            'errors' => [
                'required' => '{field} harus diisi',
                'min_length' => '{field} terlalu pendak. Alamat wajib diisi lengkap mulai nama jalan, desa, kecamatan, kabupaten dan provinsi',
                'max_length' => '{field} terlalu panjang. Alamat terlalu panjang cukup ditulis nama jalan, desa, kecamatan, kabupaten dan provinsi',
            ],
        ],
        'no_hp' => [
            'label' => 'Nomor HP Aktif',
            'rules' => [
                'required',
                'numeric',
                'min_length[8]',
                'max_length[20]',
            ],
            'errors' => [
                'required' => '{field} harus diisi',
                'numeric' => '{field} tidak boleh ada karakter lain selain angka 0-9',
                'min_length[8]' => '{field} minimal 8 karakter. Jika terlalu pendek bukan format nomer HP Indonesia',
                'max_length[20]' => '{field} maksimal 20 karakter. Jika terlalu panjang bukan format nomer HP Indonesia',
            ],
        ],
    ];
}
