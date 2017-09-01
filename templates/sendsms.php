
<div class="result alert alert-<?php echo get_criticity($result) ?>">
    <p><i class="fa fa-fw <?php echo get_fa_class($result) ?>" aria-hidden="true"></i> <?php echo $messages[$result]; ?></p>
</div>

<?php
if ( $result == "smscrypttokensrequired" ) {
    return;
}
?>

<?php if ( $result == "smsuserfound" ) : ?>
    <div class="alert alert-info">
        <form action="#" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-4 control-label"><?php echo $messages["userfullname"]; ?></label>
                <div class="col-sm-8">
                    <p class="form-control-static"><?php echo $displayname[0]; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label"><?php echo $messages["login"]; ?></label>
                <div class="col-sm-8">
                    <p class="form-control-static"><?php echo $login; ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label"><?php echo $messages["sms"]; ?></label>
                <div class="col-sm-8">
                    <p class="form-control-static"><?php if ($sms_partially_hide_number) echo (substr_replace($sms, '****', 4 , 4)); else echo $sms;?></p>
                </div>
            </div>
            <input type="hidden" name="encrypted_sms_login" value="<?php echo htmlentities($encrypted_sms_login) ?>" />
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-fw fa-check-square-o"></i> <?php echo $messages['submit']; ?>
                    </button>
                </div>
            </div>
        </form>
    </div>
<?php elseif ( $result == "smssent" or $result == "tokenattempts" ) : ?>
    <div class="alert alert-info">
        <form action="#" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="smstoken" class="col-sm-4 control-label"><?php echo $messages["smstoken"]; ?></label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-fw fa-key"></i></span>
                        <input type="text" name="smstoken" id="smstoken" class="form-control" placeholder="<?php echo $messages["smstoken"]; ?>" />
                    </div>
                </div>
            </div>
            <input type="hidden" name="token" value="<?php echo htmlentities($token) ?>" />
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-fw fa-check-square-o"></i> <?php echo $messages['submit']; ?>
                    </button>
                </div>
            </div>
        </form>
    </div>

<?php else: ?>

    <?php if ( $show_help ) { ?>
        <div class="help alert alert-warning">
            <p><i class="fa fa-fw fa-info-circle"></i> <?php echo $messages["sendsmshelp"]; ?></p>
        </div>
    <?php } ?>
    <div class="alert alert-info">
        <form action="#" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="login" class="col-sm-4 control-label"><?php echo $messages["login"]; ?></label>
                <div class="col-sm-8">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
                        <input type="text" name="login" id="login" value="<?php echo htmlentities($login) ?>" class="form-control" placeholder="<?php echo $messages["login"]; ?>" />
                    </div>
                </div>
            </div>
            <?php if ($use_recaptcha) { ?>
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <div class="g-recaptcha" data-sitekey="<?php echo $recaptcha_publickey; ?>" data-theme="<?php echo $recaptcha_theme; ?>" data-type="<?php echo $recaptcha_type; ?>" data-size="<?php echo $recaptcha_size; ?>"></div>
                        <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>"></script>
                    </div>
                </div>
            <?php } ?>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-fw fa-search"></i> <?php echo $messages['getuser']; ?>
                    </button>
                </div>
            </div>
        </form>
    </div>

<?php endif; ?>
