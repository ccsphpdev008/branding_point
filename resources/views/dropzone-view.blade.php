<!DOCTYPE html>
<html>
<head>
    <title>Upload Multiple Images using dropzone.js and Laravel</title>
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Upload Multiple Images using dropzone.js and Laravel</h1>
            <form action="{{ route('dropzone.store') }}" enctype="multipart/form" class='dropzone'  id='image-upload'>
                @csrf
                <div>
                    <h3>Upload Multiple Image By Click On Box</h3>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize : 10,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
</script>


</body>
</html>