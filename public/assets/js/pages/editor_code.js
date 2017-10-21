$(document).ready(function () {
    CKEDITOR.replace('', {
        height: '200px',
        removeButtons: 'Subscript,Superscript',
        toolbarGroups: [
            {name: 'styles'},
            {name: 'editing', groups: ['find', 'selection']},
            {name: 'basicstyles', groups: ['basicstyles']},
            {name: 'paragraph', groups: ['list', 'blocks', 'align']},
            {name: 'links'},
            {name: 'insert'},
            {name: 'colors'},
            {name: 'others'},
            {name: 'document', groups: ['mode', 'document', 'doctools']},
        ]
    });
});
