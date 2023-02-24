<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'nickname' => 'nullable|min:3|max:50',
            'birth_date' => 'nullable|date',
            'photo' => 'nullable|mimes:jpg,bmp,png',
            'shirt_number' => 'nullable|integer|min:0|max:99|unique:players,shirt_number,'.$this->id,
            'about' => 'nullable|min:10|max:5000',
            'user_id' => 'nullable|unique:players,user_id,'.$this->id,
            'first_name_visibility' => 'required|integer',
            'last_name_visibility' => 'required|integer',
            'nickname_visibility' => 'required|integer',
            'birth_date_visibility' => 'required|integer',
            'photo_visibility' => 'required|integer',
            'shirt_number_visibility' => 'required|integer',
            'about_visibility' => 'required|integer',
            'user_visibility' => 'required|integer',        
        ];
    }

    /** 
    * Get the validation messages.
    */
    public function messages(): array
    {
        return   [
            'first_name.required' => 'Meno nemôže byť prázdne.',
            'first_name.min' => 'Meno musí obsahovať :min znakov.',
            'first_name.max' => 'Meno môže obsahovať :max znakov.',
            'last_name.required' => 'Priezvisko nemôže byť prázdne.',
            'last_name.min' => 'Priezvisko musí obsahovať :min znakov.',
            'last_name.max' => 'Priezvisko môže obsahovať :max znakov.',
            'nickname.min' => 'Prezývka musí obsahovať :min znakov.',
            'nickname.max' => 'Prezývka môže obsahovať :max znakov.',
            'birth_date.date' => 'Dátum narodenia musí byť dátum.',
            'photo.mimes' => 'Neplatný formát fotky.',
            'shirt_number.integer' => 'Číslo dresu musí byť celé kladné číslo.',
            'shirt_number.min' => 'Číslo dresu môže byť minimálne :min.',
            'shirt_number.max' => 'Číslo dresu môže byť maximálne :max.',
            'shirt_number.unique' => 'Číslo dresu už je priradené inému hráčovi.',
            'about.min' => 'O mne musí obsahovať minimálne :min znakov.',
            'about.max' => 'O mne môže obsahovať maximálne :max znakov.',
            'user_id.unique' => 'Užívateľ už má vytvorený hráčsky účet.',
        ];
    }


    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $slug = Str::slug($this->first_name_visibility.' '.$this->last_name_visibility);
        if($this->first_name_visibility>1 or $this->last_name_visibility>1){
            $slug = $this->id;
        }
        $this->merge([
            'slug' => $slug,
        ]);
    }
}
