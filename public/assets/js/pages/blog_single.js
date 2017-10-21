/* ------------------------------------------------------------------------------
*
*  # Blog page - detailed
*
*  Specific JS code additions for blog page kit - detailed view
*
*  Version: 1.0
*  Latest update: Oct 10, 2016
*
* ---------------------------------------------------------------------------- */

$(function() {
    

    // CKEditor
    // ------------------------------

    $('#store-comment').stLoader();
    CKEDITOR.replace( 'addComment', {
        on: {
            instanceReady: function () {
                $('#store-comment').stUnload();
            }
        },
        height: '100px',
        extraPlugins: '',
        removeButtons: 'Subscript,Superscript',
        toolbarGroups: [
            { name: 'links' },
            { name: 'insert' }
        ]
    });

    CKEDITOR.replace( 'addReply', {
        height: '100px',
        extraPlugins: '',
        removeButtons: 'Subscript,Superscript',
        toolbarGroups: [
            { name: 'links' },
            { name: 'insert' }
        ]
    });
});
