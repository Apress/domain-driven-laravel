//in ddl/app/Http/Controllers/UploadController.php

use App\UserUpload;
use Illuminate\Support\Facades\Auth;
//..

class UploadController extends Controller
{
	public function store(UploadFileRequest $request)	
	{
           $file = $request->file('userFile')
		//save the file to the local filesystem, inside /uploads
		//*NOTE*: this also runs the MIME type check automatically:
           $path = $file->store('uploads');

		// $path will be a string returned from the store() method
		// corresponding to the saved path of the uploaded file
		$upload = UserUpload::create([
			‘user_id’ => Auth::user()->id,				
			‘filename’ => $path,
			 //a way to track the source of the uploaded file
			‘form_id’ => $request->form_id //this is arbitrary
		]);
  		//return a success message
          return response()->json(['success' => true, ‘upload’ => 
			json_encode($upload)]); 
    }
}
