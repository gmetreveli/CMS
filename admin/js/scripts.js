
 $(document).ready(function() {

    //CK EDITOR

    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );



    $('#selectAllBoxes').click(function (event) {

        if (this.checked) {

            $('.checkBoxes').each(function () {
                this.checked = true;
            });

        }else {

            $('.checkBoxes').each(function () {
                this.checked = false;
            });

        }

    });


    var div_box = "<div id='load-screen'><div id='loading'></div></div></div>";

    $("body").prepend(div_box);

    $('#load-screen').delay(777).fadeOut(666, function () {

        $(this).remove();

    });


 });
