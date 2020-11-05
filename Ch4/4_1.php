Route::get('/upload', 'UploadController@upload')->name('upload');

Route::post('/process', 'UploadController@process')->name('process');

Route::get('/list', 'UploadController@list')->name('list');
