var comphtml = '<?= $row->page_content; ?>';
var compcss = '<?= $row->page_css; ?> ';
//var boostrap_load = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">';

//function myPlugin(editor){
//      editor.BlockManager.add('my-first-block', {
//        label: 'footer contact us',
//        content: '<div class="jumbotron text-center"><h1>Company</h1><p>We specialize in blablabla</p><form class="form-inline"><div class="input-group"><input type="email" class="form-control" size="50" placeholder="Email Address" required><div class="input-group-btn"><button type="button" class="btn btn-danger">Subscribe</button></div></div></form></div>',
//      });
//  }

var editor = grapesjs.init({
    container: '#gjs',
    //components: '<div class="txt-red">testHello world!</div><div class="txt-red">testHello world!</div>',
    //components: boostrap_load+comphtml,
    components: comphtml,
    //style: '.txt-red{color: red}.txt-red{margin: 10px}',
    style: compcss,
    storageManager: false,
    plugins: [myPlugin, 'grapesjs-custom-code', 'grapesjs-plugin-export', 'gjs-blocks-flexbox' ],
    pluginsOpts: {

      
        'grapesjs-custom-code': {
            // options
            //'<div class="txt-red">test world!</div>'
        },
        'grapesjs-plugin-export': {
            /* options */
            
        },
        'gjs-blocks-flexbox': {
            // options
        }
//        'gjs-plugin-ckeditor': {
//           position: 'center',
//            options: {
//              startupFocus: true,
//              extraAllowedContent: '*(*);*{*}', // Allows any class and any inline style
//              allowedContent: true, // Disable auto-formatting, class removing, etc.
//              enterMode: CKEDITOR.ENTER_BR,
//              extraPlugins: 'sharedspace,justify,colorbutton,panelbutton,font',
//              toolbar: [
//                { name: 'styles', items: ['Font', 'FontSize' ] },
//                ['Bold', 'Italic', 'Underline', 'Strike'],
//                {name: 'paragraph', items : [ 'NumberedList', 'BulletedList']},
//                {name: 'links', items: ['Link', 'Unlink']},
//                {name: 'colors', items: [ 'TextColor', 'BGColor' ]},
//              ],
//        }

    },
    canvas: {
        scripts: ['https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'],
        styles: ['https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'],

    }

});

//alert(editor.getHtml());
//alert(editor.getCss());
editor.Panels.addButton('options',
        [{
                id: 'save-db',
                className: 'fa fa-floppy-o save-data-to-text',
                command: 'save-db',

                attributes: {
                    title: 'Save Changes'
                }
            }]
        );
var upd_html;
var upd_css;
editor.Commands.add('save-db', {
    run: function (editor, sender) {
        sender && sender.set('active', 0); // turn off the button
        editor.store();
        //storing values to variables
        upd_html = editor.getHtml();
        upd_css = editor.getCss();
        //alert(editor.getHtml());
        //alert('Page Updated');
        //editor.runCommand('gjs-export-zip');
    }
});

//$(document).ready(function(){
//  $("#save-db").click(function(){
//    $(".txt-save").val(upd_html);
//  });
//});

$(".save-data-to-text").click(function () {
    $(".txt-save-html").val(upd_html);
    $(".txt-save-css").val(upd_css);
    alert("please click save button to save the data");
});


// editor.on('component:add', options => { 
//  var html = editor.getHtml();
//  var css = editor.getCss(); 
//  //alert(editor.getHtml());
//  alert('Page Updated');
// function create () {
//        $.ajax({
//            url:base_url+"/savepagedata.php",    
//            type: "post", 
//            data: {html_data: html , css_data:css },
//            success:function(result){
//                console.log(result);
//            }
//        });
//    }
//
//});
//editor.setComponents(comphtml);
//editor.setS(comphtml);