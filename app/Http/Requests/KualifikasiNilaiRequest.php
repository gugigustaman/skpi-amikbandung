<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KualifikasiNilaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'index' => 'required',
            'angka' => 'required',
            'nilai_semester_from' => 'required',
            'nilai_semester_to' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'index' => 'Index',
            'angka' => 'Angka',
            'nilai_semester_from' => 'Awal Nilai Semester',
            'nilai_semester_to' => 'Akhir Nilai Semester ',
        ];
    }
    public function messages()
    {
        return [
            'index.required' => ':attribute Harus Diisi',
            'angka.required' => ':attribute Harus Diisi',
            'nilai_semester_from.required' => ':attribute Harus Diisi',
            'nilai_semester_to.required' => ':attribute Harus Diisi',
        ];
    }
    public function form()
    {
        return [
            'user_id' => auth()->user()->id,
            'index' => $this->index,
            'angka' => $this->angka,
            'nilai_semester_from' => $this->nilai_semester_from,
            'nilai_semester_to' => $this->nilai_semester_to,
            'keterangan' => $this->keterangan,
        ];
    }
}
