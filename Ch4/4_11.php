// ddl/app/Jobs/SaveUploadedFile.php

<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SaveUploadedFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
	* Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
?>



<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Symfony\Component\HttpFoundation\File\File;
use App\UserUpload;

class SaveUploadedFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $fileName;

    protected $upload;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(File $upload)
    {
        $this->upload = $upload;

    }

    /**
    * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //save the user’s file and grab its path on the filesystem
           $path = $this->upload->store('uploads');
      //create a record to track user’s uploaded files
        $upload = UserUpload::create([
            ‘user_id’ => Auth::user()->id,              
            ‘filename’ => $path,
        ]);

        //do a final verification check that the saved file exists
        if (!is_file($path)) {
            throw new Exception(“Problem with saving the file”);
       }
    
        return $path;
    }
}


//SaveUploadedFile Job

public function store(UploadFileRequest $request)   
{
     $file = $request->file('userFile');
     $filePath = SaveUploadedFile::dispatchNow($file);

    return response()->json(['success' => true]); 
}


