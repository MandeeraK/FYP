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

</head>
<body>
<style>
    /*basic settings */

    a:focus {
    outline: none !important;
    outline-offset: none !important;
    }

    body {
    background: #f5f6f5;
    color: #333;
    }

    /* helper classses */

    .margin-top-20 {
    margin-top: 20px;
    }

    .margin-bottom-20 {
    margin-top: 20px;
    }

    .no-margin {
    margin: 0px;
    }

    /* box component */

    .box {
    border-color: #e6e6e6;
    background: #FFF;
    border-radius: 6px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);
    padding: 10px;
    margin-bottom: 40px;
    }

    .box-center {
    margin: 20px auto;
    }

    /* input [type = file]
    ----------------------------------------------- */

    input[type=file] {
    display: block !important;
    right: 1px;
    top: 1px;
    height: 34px;
    opacity: 0;
    width: 100%;
    background: none;
    position: absolute;
    overflow: hidden;
    z-index: 2;
    }

    .control-fileupload {
    display: block;
    border: 1px solid #d6d7d6;
    background: #FFF;
    border-radius: 4px;
    width: 100%;
    height: 36px;
    line-height: 36px;
    padding: 0px 10px 2px 10px;
    overflow: hidden;
    position: relative;

    :before, input, label {
    cursor: pointer !important;
    }
    /* File upload button */
    :before {
    /* inherit from boostrap btn styles */
    padding: 4px 12px;
    margin-bottom: 0;
    font-size: 14px;
    line-height: 20px;
    color: #333333;
    text-align: center;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    vertical-align: middle;
    cursor: pointer;
    background-color: #f5f5f5;
    background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
    background-repeat: repeat-x;
    border: 1px solid #cccccc;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    border-bottom-color: #b3b3b3;
    border-radius: 4px;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    transition: color 0.2s ease;

    /* add more custom styles*/
    content: 'Browse';
    display: block;
    position: absolute;
    z-index: 1;
    top: 2px;
    right: 2px;
    line-height: 20px;
    text-align: center;
    }
    :hover, :focus {
    :before {
    color: #333333;
    background-color: #e6e6e6;
    color: #333333;
    text-decoration: none;
    background-position: 0 -15px;
    transition: background-position 0.2s ease-out;
    }
    }

    label {
    line-height: 24px;
    color: #999999;
    font-size: 14px;
    font-weight: normal;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    position: relative;
    z-index: 1;
    margin-right: 90px;
    margin-bottom: 0px;
    cursor: text;
    }
    }
</style>
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

