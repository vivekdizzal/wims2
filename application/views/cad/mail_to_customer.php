<div class="dialog_con1">
    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" action="" method="post">
                <div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1">To</label> <div class="col-sm-10"> <input type="email" name="email" class="form-control" id="email"> </div> </div>
                <div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1">Cc</label> <div class="col-sm-10"> <input type="email" name="cc_email" class="form-control" id="cc_email"> </div> </div>
                <div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1">Attachments</label> <div class="col-sm-10"> <input type="file" name="attachment" class="form-control" onclick="uploadFile()">  <button>Upload</button>
                    </div> </div>
                <div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1">Subject</label> <div class="col-sm-10"> <textarea class="form-control" name="subject"></textarea> </div> </div>
                <div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1"></label> <div class="col-sm-10"> <button class="btn btn-primary" type="submit">Send</button></div> </div>


            </form>
        </div>
    </div>

</div>
<?php $Url= "122"; ?>
<script>
    function uploadFile() {
        var file = _("attachment").files[0];
        // alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append("attachment", file);
        var ajax = new XMLHttpRequest();
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "<?php echo $Url; ?>");
        ajax.send(formdata);
    }

    $(document).ready(function () {
        $("body").on("click", ".delete-files", function () {
            var file_name = $(this).attr("file_name");
            var textboxval = $("#file_names").val();
            textboxval = textboxval.replace(file_name + ',', '');
            textboxval = textboxval.replace(',' + file_name, '');
            textboxval = textboxval.replace(file_name, '');
            $("#file_names").val(textboxval);
            $(this).parent('li').remove();
        });
    });
</script>