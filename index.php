<?php
/**
 * Created by PhpStorm.
 * User: mandeera
 * Date: 2/25/18
 * Time: 10:37 PM
 */
?>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Upload')">Upload</button>
    <button class="tablinks" onclick="openCity(event, 'Upload2')">Upload2</button>
    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
</div>
<div id="Upload" class="tabcontent">
    <article id="main-content" role="main">
        <section class="container">
            <div class="row">
                <div class="col-md-4">
                    <header>
                        <h1>File Encryptor</h1>
                    </header>
                </div>
                <div class="col-md-8">
                    <!--./file input example -->
                    <p>&nbsp;</p>
                    <hr>
                    <h3 class="text-info">Example 2 : large upload iframe</h3>
                    <p><strong>Note:</strong> This is a CSS Demo only, no JavaScript nor Server side Code is provided to handle file preview or upload status.</p>
                    <!--image file upoad sample-->
                    <div class="box">
                        <!-- fileuploader view component -->
                        <form action="#" method="post" class="text-center">
                            <div class="margin-bottom-20">
                                <img class="thumbnail box-center margin-top-20" alt="No image" src="http://www.washaweb.com/tutoriaux/fileupload/imgs/image-temp-220.png">
                            </div>
                            <p>
                                <button type="submit" class="btn btn-sm" name="delete"><i class="icon-remove"></i> Remove</button>
                                <button type="submit" class="btn btn-primary btn-sm" id="save" name="save"><i class="icon-ok icon-white"></i> Save</button>
                            </p>
                        </form>
                        <!-- ./fileuploader view component -->
                        <div class="row">
                            <div class="col-sm-10">
              <span class="control-fileupload">
                <label for="file1" class="text-left">Please choose a file on your computer.</label>
                <input type="file" id="file1">
              </span>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-primary btn-block">
                                    <i class="icon-upload icon-white"></i> Upload
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br />
                    <hr />
                </div>
            </div>
        </section>
    </article>
</div>
<div id="Upload2" class="tabcontent">

</div>

<script>
    $(function() {
        $('input[type=file]').change(function(){
            var t = $(this).val();
            var labelText = 'File : ' + t.substr(12, t.length);
            $(this).prev('label').text(labelText);
        })
    });
</script>
</body>
</html>

