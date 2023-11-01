

<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')

<link rel="stylesheet" href='<?php echo url('/'); ?>/css/grapes.min.css'>
<script src="<?php echo url('/'); ?>/js/dist/grapes.min.js"></script>
<script src="<?php echo url('/'); ?>/js/dist/grapesjs-custom-code.js"></script>
<script src="<?php echo url('/'); ?>/js/dist/grapesjs-plugin-export.js"></script>
<script src="<?php echo url('/'); ?>/js/dist/grapesjs-blocks-basic.js"></script>
<script src="<?php echo url('/'); ?>/js/dist/grapesjs-style-gradient.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="<?php echo url('/'); ?>/js/dist/grapesjs-blocks-flexbox.js"></script>
<script src='<?php echo url('/'); ?>/js/dist/grapesjs-plugin-filestack.min.js'></script>
<script src='<?php echo url('/'); ?>/js/dist/boostrap-widget.js'></script>
<!--<script src='https://unpkg.com/grapesjs-plugin-ckeditor'></script>-->
<style>
    .gjs-one-bg {
    background-color: #dddcdc !important;
}

.gjs-two-color {
    color: #000 !important;
}

.skin-blue-light .content-header {
    background: transparent;
    display: none !important;
}    
.gjs-sm-sector-label {
    font-size: 12px !important;
}
.gjs-sm-label {
    font-size: 12px !important;
}
.gjs-fields {
    display: flex;
    font-size: 12px !important;
}
.gjs-color-main, .gjs-sm-stack #gjs-sm-add, .gjs-off-prv {
    color: #000;
    fill: #000;
}
</style>

<div class='row'>
    <div class='col-md-10'>
        <div id="gjs">

</div>
        
    </div>
    <div class='col-md-2'>
        <div class='panel panel-default'>
    <div class='panel-heading'>Edit Page</div>
    <div class='panel-body'>

        <form method='post' action='{{CRUDBooster::mainpath('edit-save/'.$row->id)}}'>
            <div class='form-group'>
                <label>Header Title</label>
                <input type='text' name='header_title' required class='form-control' value='<?= $row->header_title; ?>'/>
                <input type='hidden' class="txt-save-html" name='header_content' required class='form-control' value=''/>
                <input type='hidden' class="txt-save-css" name='header_css' required class='form-control' value=''/>
                
               <label>Header status</label>
                        <select style="width:100%" class="form-control select2-hidden-accessible" id="header_status" name="header_status" tabindex="-1" aria-hidden="true">
                            <?php
                            if ($row->header_status == 2) {
                                echo '<option value="2">Publish </option><option value="1">Draft </option>';
                            } else {
                                echo '<option value="1">Draft </option><option value="2">Publish </option>';
                            }
                            ?>




                        </select>
                
            </div>
            @csrf

            <div class='panel-footer'>
                <input type='submit' class='btn btn-primary save-all' disabled value='Save changes'/>
            </div>
        </form>
    </div>

</div>
        
        
    </div>
</div>




<script type="text/javascript">
var comphtml = '<?= $row->header_content; ?>';
var compcss = '<?= $row->header_css; ?> ';

var editor = grapesjs.init({
    container: '#gjs',
    //components: '<div class="txt-red">testHello world!</div><div class="txt-red">testHello world!</div>',
    //components: boostrap_load+comphtml,
    components: comphtml,
    //style: '.txt-red{color: red}.txt-red{margin: 10px}',
    style: compcss,
    storageManager: false,
    plugins: [myPlugin, 'grapesjs-custom-code', 'grapesjs-plugin-export', 'gjs-blocks-flexbox', 'gjs-blocks-basic', 'grapesjs-style-gradient' ],
    pluginsOpts: {
        'grapesjs-style-gradient': {
          colorPicker: 'default',
          grapickOpts: {
            min: 1,
            max: 99,
          }
        }},
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
        //editor.runCommand('gjs-export-zip');
    }
});


$(".save-data-to-text").click(function () {
    $(".txt-save-html").val(upd_html);
    $(".txt-save-css").val(upd_css);
    $('.save-all').prop('disabled', false);
    alert("Please click save button to save the changes");
});




</script>

<style>
    .icn-block {
    font-size: 35px;
}

.gjs-block-label {
    font-size: 12px;
}

</style>


@endsection
<!-- ADD A PAGINATION -->
