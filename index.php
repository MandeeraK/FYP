<?php
/**
 * Created by PhpStorm.
 * User: mandeera
 * Date: 2/25/18
 * Time: 10:37 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<h1>Upload file here</h1>
<!--<form enctype="multipart/form-data" action="upload.php" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
    Choose a file to upload: <input name="uploadedfile" type="file" /><br/>
    <input type="button" value="Encrypt" onclick="myFunction()">
    <input type="submit" value="Upload File">-->
<div id="stage">

    <div id="step1">
        <div class="content">
            <h1>What do you want to do?</h1>
            <a class="button encrypt green">Encrypt a file</a>
            <a class="button decrypt magenta">Decrypt a file</a>
        </div>
    </div>

    <div id="step2">

        <div class="content if-encrypt">
            <h1>Choose which file to encrypt</h1>
            <h2>An encrypted copy of the file will be generated. No data is sent to our server.</h2>
            <a class="button browse blue">Browse</a>

            <input type="file" id="encrypt-input" />
        </div>

        <div class="content if-decrypt">
            <h1>Choose which file to decrypt</h1>
            <h2>Only files encrypted by this tool are accepted.</h2>
            <a class="button browse blue">Browse</a>

            <input type="file" id="decrypt-input" />
        </div>

    </div>

    <div id="step3">

        <div class="content if-encrypt">
            <h1>Enter a pass phrase</h1>
            <h2>This phrase will be used as an encryption key. Write it down or remember it; you won't be able to restore the file without it. </h2>

            <input type="password" />
            <a class="button process red">Encrypt!</a>
        </div>

        <div class="content if-decrypt">
            <h1>Enter the pass phrase</h1>
            <h2>Enter the pass phrase that was used to encrypt this file. It is not possible to decrypt it without it.</h2>

            <input type="password" />
            <a class="button process red">Decrypt!</a>
        </div>

    </div>

    <div id="step4">

        <div class="content">
            <h1>Your file is ready!</h1>
            <a class="button download green">Download</a>
        </div>

    </div>
</div>
</form>
</body>
<script>
    $(function(){

        var body = $('body'),
            stage = $('#stage'),
            back = $('a.back');

        /* Step 1 */

        $('#step1 .encrypt').click(function(){
            body.attr('class', 'encrypt');

            // Go to step 2
            step(2);
        });

        $('#step1 .decrypt').click(function(){
            body.attr('class', 'decrypt');
            step(2);
        });


        /* Step 2 */


        $('#step2 .button').click(function(){
            // Trigger the file browser dialog
            $(this).parent().find('input').click();
        });


        // Set up events for the file inputs

        var file = null;

        $('#step2').on('change', '#encrypt-input', function(e){

            // Has a file been selected?

            if(e.target.files.length!=1){
                alert('Please select a file to encrypt!');
                return false;
            }

            file = e.target.files[0];

            if(file.size > 1024*1024){
                alert('Please choose files smaller than 1mb, otherwise you may crash your browser. \nThis is a known issue. See the tutorial.');
                return;
            }

            step(3);
        });

        $('#step2').on('change', '#decrypt-input', function(e){

            if(e.target.files.length!=1){
                alert('Please select a file to decrypt!');
                return false;
            }

            file = e.target.files[0];
            step(3);
        });


        /* Step 3 */


        $('a.button.process').click(function(){

            var input = $(this).parent().find('input[type=password]'),
                a = $('#step4 a.download'),
                password = input.val();

            input.val('');

            if(password.length<5){
                alert('Please choose a longer password!');
                return;
            }

            // The HTML5 FileReader object will allow us to read the
            // contents of the	selected file.

            var reader = new FileReader();

            if(body.hasClass('encrypt')){

                // Encrypt the file!

                reader.onload = function(e){

                    // Use the CryptoJS library and the AES cypher to encrypt the
                    // contents of the file, held in e.target.result, with the password

                    var encrypted = CryptoJS.AES.encrypt(e.target.result, password);

                    // The download attribute will cause the contents of the href
                    // attribute to be downloaded when clicked. The download attribute
                    // also holds the name of the file that is offered for download.

                    a.attr('href', 'data:application/octet-stream,' + encrypted);
                    a.attr('download', file.name + '.encrypted');

                    step(4);
                };

                // This will encode the contents of the file into a data-uri.
                // It will trigger the onload handler above, with the result

                reader.readAsDataURL(file);
            }
            else {

                // Decrypt it!

                reader.onload = function(e){

                    var decrypted = CryptoJS.AES.decrypt(e.target.result, password)
                        .toString(CryptoJS.enc.Latin1);

                    if(!/^data:/.test(decrypted)){
                        alert("Invalid pass phrase or file! Please try again.");
                        return false;
                    }

                    a.attr('href', decrypted);
                    a.attr('download', file.name.replace('.encrypted',''));

                    step(4);
                };

                reader.readAsText(file);
            }
        });


        /* The back button */


        back.click(function(){

            // Reinitialize the hidden file inputs,
            // so that they don't hold the selection
            // from last time

            $('#step2 input[type=file]').replaceWith(function(){
                return $(this).clone();
            });

            step(1);
        });


        // Helper function that moves the viewport to the correct step div

        function step(i){

            if(i == 1){
                back.fadeOut();
            }
            else{
                back.fadeIn();
            }

            // Move the #stage div. Changing the top property will trigger
            // a css transition on the element. i-1 because we want the
            // steps to start from 1:

            stage.css('top',(-(i-1)*100)+'%');
        }

    });

    /*$(myFunction(){
        var reader = new FileReader();

        if(body.hasClass('encrypt')){

            // Encrypt the file!

            reader.onload = function(e){

                // Use the CryptoJS library and the AES cypher to encrypt the
                // contents of the file, held in e.target.result, with the password

                var encrypted = CryptoJS.AES.encrypt(e.target.result, password);

                // The download attribute will cause the contents of the href
                // attribute to be downloaded when clicked. The download attribute
                // also holds the name of the file that is offered for download.

                a.attr('href', 'data:application/octet-stream,' + encrypted);
                a.attr('download', file.name + '.encrypted');

                step(4);
            };

            // This will encode the contents of the file into a data-uri.
            // It will trigger the onload handler above, with the result

            reader.readAsDataURL(file);
        }
    })*/
</script>
<script src="aes.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!--<script src="assets/js/script.js"></script>-->
</html>


