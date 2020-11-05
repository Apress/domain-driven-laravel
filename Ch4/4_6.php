   <h1>Upload a file</h1>
   <form id="uploadForm" name="uploadForm" action="{{route('upload')}}" enctype="multipart/form-data">
       @csrf
       <label for="fileName">File Name:</label>
       <input type="text" name="fileName" id="fileName" required />
	  <br />
	  <label for="userFile">Select a File</label>
       <input type="file" name="userFile" id="userFile" required />
       <button type="submit" name="submit">Submit</button>
   </form>
   <h2 id="success" style="color:green;display:none">Successfully uploaded file</h2>
   <h2 id="error" style="color:red;display:none">Error Submitting File</h2>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script>
        $('#uploadForm').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                url: url,
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    $("#fileName").val("");
                    $("#userFile").val("");
                }
            }).done(function() {
                $('#success').css('display', 'block');
                window.setTimeout(()=>($("#success").css('display',
'none')), 5000);
            }).fail(function() {
                $('#error').css('display', 'block');
                window.setTimeout(()=>($("#error").css('display',
'none')), 5000);
            });
        });
   </script>
</body>
</html>
