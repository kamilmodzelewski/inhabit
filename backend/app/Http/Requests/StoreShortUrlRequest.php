<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShortUrlRequest extends FormRequest
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
            'original_url' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    return $this->validateUrl($attribute, $value, $fail);
                }
            ],
        ];
    }

    protected function validateUrl($attribute, $value, $fail)
    {
        $url = $value;
        
        try {
            $headers = get_headers($url);
            $httpCode = substr($headers[0], 9, 3);
        }
        catch (\Exception $e) {
            //replace with curl
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

        }
        // no response
        if($httpCode == 0) {
            return $fail('The ' . $attribute . ' is invalid.');
        }
    }
}
