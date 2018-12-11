<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form_push" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
            <h1><?php echo $heading_title; ?></h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i><?php echo $text_edit; ?></h3>
            </div>
            <div class="panel-body">
                <div id="status"></div>
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-push" class="form-horizontal">
                    <div class="form-group">
                        <br/>
                        <div class="container" id="groubChatID">
                            <div class="input-group col-lg-5">
                                <span class="input-group-addon" id="basic-addon1"><?php echo $entry_return_BOTTOKEN; ?></span>
                                <input type="text" name="telegram_boot_token" id="telegram_boot_token"  value="<?php echo $telegram_boot_token; ?>" placeholder="BOT_TOKEN" class="form-control" />
                                <span class="input-group-btn"><button  class="btn btn-info " type="button"><i class="fa fa-bookmark"></i></button> </span>
                            </div>
                            <br>
                            
                            <br/>
                            <div class="input-group col-lg-5">
                                <span class="input-group-addon" id="basic-addon1"><?php echo $entry_return_chatID; ?></span>
                                <input type="text" name="telegram_chat_ids" class="form-control"  value="<?php echo $telegram_chat_ids; ?>" />
                                <span class="input-group-btn"><button  class="btn btn-danger removed" type="button"><i class="fa fa-trash-o"></i></button></span>
                            </div>
                         
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="input-status"></label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="order_alert">
                                    <?php echo $entry_send_order_alert; ?>
                                    </label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" name="telegram_order_alert" id="order_alert" <?php if($telegram_order_alert) { ?> checked <?php } ?>
                                        class="form-control" />
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="btn-toolbar" class="btn-group btn-group-justified" role="group" id="buttonKey"></div>
                                        <br>
                                        <?php echo $entry_return_message; ?>
                                        <textarea rows="10" cols="50" class="form-control" id="telegram_meassage" name="telegram_meassage" rows="3"><?php if($telegram_meassage == "") { ?> <?php echo $entry_return_messag_text; ?><?php } ?><?php if($telegram_meassage) { ?><?php echo $telegram_meassage; ?><?php } ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="customer_alert">
                                    <?php echo $entry_send_new_customer_alert; ?>
                                    </label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" name="telegram_customer_alert" id="telegram_customer_alert" <?php if($telegram_customer_alert) { ?> checked <?php } ?> class="form-control" />
                                    </div>
                                    <div class="container">
                                        <div class="input-group col-lg-5">
                                            <br/>
                                            <div class="btn-toolbar" id="buttonKeyNewAccount"></div>
                                            <label for="exampleFormControlTextarea1"><?php echo $text_new_account_messag; ?></label>
                                            <textarea rows="3" cols="50" class="form-control" id="telegram_new_account_meassage" name="telegram_new_account_meassage"><?php if($telegram_new_account_meassage == "") { ?>
                                            <?php echo $entry_new_account_messag_text; ?><?php } ?>
                                            <?php if($telegram_new_account_meassage) { ?>
                                            <?php echo $telegram_new_account_meassage; ?>
                                            <?php } ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="return">
                                    <?php echo $entry_return_alert; ?>
                                    </label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" name="telegram_return_alert" id="return" 
                                        <?php if($telegram_return_alert) { ?> checked <?php } ?>class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="input-module_hello_world_status"><?php echo $entry_status; ?></label>
                                    <div class="col-sm-10">
                                        <select name="telegram_status" id="telegram_status" class="form-control">
                                        <?php if($telegram_status) { ?>
                                            <option value="1" selected>
                                            <?php echo $text_enabled; ?></option>
                                            <option value="0">
                                            <?php echo $text_disabled; ?></option>
                                            <?php } else { ?>
                                            <option value="1">
                                            <?php echo $text_enabled; ?></option>
                                            <option value="0" selected>
                                            <?php echo $text_disabled; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
        </form>
    </div>
    <script type="text/javascript">



        var obj = ["order_id",  "store_name", "customer_id","firstname", "lastname", "email", "telephone",  "payment_firstname", "payment_lastname", "payment_address_1", "payment_address_2",  "payment_city", "payment_zone",  "payment_country",  "payment_address_format",  "payment_method", "payment_postcode", "shipping_firstname", "shipping_lastname", "shipping_company", "shipping_address_1", "shipping_address_2", "shipping_postcode", "shipping_city",  "shipping_zone",  "shipping_country",  "shipping_address_format", "shipping_method", "comment", "total", "order_status_id", "order_status",   "currency_value", "date_added", "date_modified"];
        var objNewAccount = ["firstname", "lastname",  "email",  "telephone"];
        



        $( document ).ready(function() {

            $.each( obj, function( key, value ) {

                $("#buttonKey").append(' <button onclick = "appenTextarea('+key+')" style="margin:2px;" class="btn btn-info buttonKey" keys="'+value+'" type="button">'+value+'</button>');

            });



            $.each( objNewAccount, function( key, value ) {

                $("#buttonKeyNewAccount").append('<div role="group"  class="btn-group"> <button onclick = "appenTextareaNewAccount('+key+')" class="btn btn-info btn-sm buttonKey" keys="'+value+'" type="button">'+value+'</button> </div>');

            });

            removActive();

        });



        function appenTextarea(key){
            var $txt = jQuery("#telegram_meassage");
            var caretPos = $txt[0].selectionStart;
            var textAreaTxt = $txt.val();
            var txtToAdd = "{"+obj[key]+"}";
            $txt.val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
        }



        function appenTextareaNewAccount(key){
            var $txt = jQuery("#telegram_new_account_meassage");
            var caretPos = $txt[0].selectionStart;
            var textAreaTxt = $txt.val();
            var txtToAdd = "{"+objNewAccount[key]+"}";
            $txt.val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
        }

        function removActive(){
            $('.removed').on('click',function () {
                $(this).parent().prevAll('input').remove();
                $(this).parent().prevAll('div').remove();
                $(this).parent().prevAll('span').remove();
                $(this).remove();
            });
        }
    </script>

<?php echo $footer; ?>
