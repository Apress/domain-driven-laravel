// ddl/app/Http/Requests/UploadFileRequest.php

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFileRequest extends FormRequest
{

  /**
	* Determine if the user is authorized to make this request.
	*
	* @return bool
	*/
    public function authorize()
    {
	    // NOTE: This is a convenient location to include any auth
	    // checks or other authentication logic specific to this
	    // specific form request.

	    return true;
    }

    /**
     * Get the validation rules that apply to the request. It is here 
     * that we specify how we want the data to be structured and what
     * it should look like. 
     *
     * @return array
     */
    public function rules()
    {
      return [
           'fileName' => 'required|string',
           'userFile' => 'required|file'
       ];
    }
}


