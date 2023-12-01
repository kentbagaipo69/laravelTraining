<?php

namespace App\Http\Requests\Contact;
use App\Models\Contact\Contacts;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateContactRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required','string', 'max:255'],
            'last_name' => ['required','string', 'max:255'],
            'email_address' => ['required','string', 'max:255','email:rfc,dns,spoof,filter'
        ,Rule::unique('contacts','email_address')->ignore($this->contact->id)],
            'middle_name' => ['nullable','string', 'max:255'],
						'barangay' => ['required','string', 'max:255'],
						'street' => ['required','string', 'max:255'],
          
        ];
    }
}
