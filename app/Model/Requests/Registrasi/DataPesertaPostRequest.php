<?php

namespace App\Model\Requests\Registrasi;

use App\Model\Requests\PostRequest;

class DataPesertaPostRequest extends PostRequest
{
    /**
     * General validation rules
     * 
     * @var array
     */
    private $generalRules = [
        'text' => ['required', 'string'],
        'optional_text' => ['nullable', 'string'],
        'ktm' => ['required', 'file', 'image', 'mimes:jpeg,jpg', 'max:3999']
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Peserta1_Nama' => $this->generalRules['text'],
            'Peserta1_Jurusan' => $this->generalRules['text'],
            'Peserta1_NoHP' => $this->generalRules['text'],
            'Peserta1_IDLine' => $this->generalRules['optional_text'],
            'Peserta1_KTM' => $this->generalRules['ktm'],

            'Peserta2_Nama' => $this->generalRules['text'],
            'Peserta2_Jurusan' => $this->generalRules['text'],
            'Peserta2_NoHP' => $this->generalRules['text'],
            'Peserta2_IDLine' => $this->generalRules['optional_text'],
            'Peserta2_KTM' => $this->generalRules['ktm'],
        ];
    }

    /**
     * General validation error messages
     * 
     * @var array
     */
    private $generalErrorMessages = [
        'Nama' => [
            'required' => 'Nama Peserta tidak boleh kosong'
        ],
        'Jurusan' => [
            'required' => 'Jurusan tidak boleh kosong'
        ],
        'NoHP' => [
            'required' => 'Nomor Handphone tidak boleh kosong'
        ],
        'KTM' => [
            'required' => 'Kartu Mahasiswa tidak boleh kosong',
            'file' => 'Kartu Mahasiswa harus berupa file',
            'image' => 'Kartu Mahasiswa harus berupa gambar',
            'mimes' => 'Kartu Mahasiswa harus memiliki format .jpg',
            'max' => 'Kartu Mahasiswa maksimal berukuran :max kilobytes',
        ]
    ];

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'Peserta1_Nama.required' => $this->generalErrorMessages['Nama']['required'],
            'Peserta1_Jurusan.required' => $this->generalErrorMessages['Jurusan']['required'],
            'Peserta1_NoHP.required' => $this->generalErrorMessages['NoHP']['required'],

            'Peserta1_KTM.required' => $this->generalErrorMessages['KTM']['required'],
            'Peserta1_KTM.file' => $this->generalErrorMessages['KTM']['file'],
            'Peserta1_KTM.image' => $this->generalErrorMessages['KTM']['image'],
            'Peserta1_KTM.mimes' => $this->generalErrorMessages['KTM']['mimes'],
            'Peserta1_KTM.max' => $this->generalErrorMessages['KTM']['max'],

            'Peserta2_Nama.required' => $this->generalErrorMessages['Nama']['required'],
            'Peserta2_Jurusan.required' => $this->generalErrorMessages['Jurusan']['required'],
            'Peserta2_NoHP.required' => $this->generalErrorMessages['NoHP']['required'],

            'Peserta2_KTM.required' => $this->generalErrorMessages['KTM']['required'],
            'Peserta2_KTM.file' => $this->generalErrorMessages['KTM']['file'],
            'Peserta2_KTM.image' => $this->generalErrorMessages['KTM']['image'],
            'Peserta2_KTM.mimes' => $this->generalErrorMessages['KTM']['mimes'],
            'Peserta2_KTM.max' => $this->generalErrorMessages['KTM']['max'],
        ];
    }
}