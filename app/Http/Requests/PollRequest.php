<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PollRequest extends FormRequest
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
        $config = config('settings.length_poll');
        return [
            'name' => 'required|max:' . $config['name'],
            'email' => 'required|email|max:' . $config['email'],
            'title' => 'required|max:' . $config['title'],
            'description' => 'max:' . $config['description'],
            'type' => 'required',
            'option' => 'option:optionImage',
            'email_poll' => 'email_poll:invite',
            'custom_link' => 'setting:link',
            'set_limit' => 'setting:limit',
            'set_password' => 'setting:password_poll',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        $trans = trans('polls.validation');
        return [
            'name.required' => $trans['name']['required'],
            'name.max' => $trans['name']['max'],
            'email.required' => $trans['email']['required'],
            'email.email' => $trans['email']['email'],
            'email.max' => $trans['email']['max'],
            'title.required' => $trans['title']['required'],
            'title.max' => $trans['title']['max'],
            'description.max' => $trans['description']['max'],
            'type.required' => $trans['type']['required'],
            'option.option' => $trans['option']['option'],
            'email_poll.email_poll' => $trans['email_poll']['email_poll'],
            'custom_link.setting' => $trans['custom_link']['setting'],
            'set_limit.setting' => $trans['set_limit']['setting'],
            'set_password.setting' => $trans['set_password']['setting'],
        ];
    }
}
