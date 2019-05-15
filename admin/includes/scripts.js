
$(document).ready(function() {

    //CK EDITOR

    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );


});
