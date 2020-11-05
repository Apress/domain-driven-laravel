<?php
namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use App\Http\Requests\UploadFileRequest;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * This is the method that will simply list all the files uploaded
     * by name and provide a link to each one so they may be
     * downloaded
	 * @param $request : A standard form request object
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws BindingResolutionException
     */
	public function list(Request $request)
	{
		$uploads = Storage::allFiles('uploads');
		return view('list', ['files' => $uploads]);
    }

    /**
	* @param $file
	* @return \Symfony\Component\HttpFoundation\BinaryFileResponse	
	* @throws BindingResolutionException
    */
    public function download($file)
    {
        return response()->download(storage_path('app/'.$file));
    }

    /**
	* @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	* @throws BindingResolutionException
	*/
	public function upload()
	{
	   return view('upload');
	}
	
    /**	
	* This method will handle the file uploads. Notice that the 
	* parameter's type-hint is the exact request class we generated
	* in the last step. There is a reason for this!
	*
	* @param $request : The form request for uploading a file
	* @return array | \Illuminate\Http\UploadedFile | 
	* 		\Illuminate\Http\UploadedFile[] | null
     * @throws BindingResolutionException
	*/
	public function store(UploadFileRequest $request)	
	{
		$filename = $request->fileName;
		//the request is valid at this point because of the defined
		//parameters we specified in the form request
           $file = $request->file('userFile'); //no isset() req’d

		//retrieve the original extension of uploaded file
           $extension = $file->getClientOriginalExtension(); 
		//create a new file name
           $saveAs = $filename . "." . $extension;
		//save the file to the local filesystem, inside uploads/
           $file->storeAs('uploads', $saveAs, 'local');
  		//return a success message
          return response()->json(['success' => true]); 
    }
}

