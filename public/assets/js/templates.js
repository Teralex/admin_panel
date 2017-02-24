var editor = CKEDITOR.replace('editor1', {
    //startupMode : 'source',
    allowedContent: true,
    extraPlugins: 'templates,uploadimage',
    filebrowserUploadUrl: '/upload/image'
});
editor.on( 'change', function( evt ) {
    $("#content").val(evt.editor.getData());
});

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$.ajax({
    url: '/api/templates',
    type: 'GET',
    data: {_token: CSRF_TOKEN},
    success: function (data) {
        CKEDITOR.addTemplates("default",
            {
                imagesPath: CKEDITOR.getUrl(CKEDITOR.plugins.getPath("templates")+"templates/images/"),
                templates: JSON.parse(data)
            }
        );
    }
});