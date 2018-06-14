<?php $__env->startSection('title'); ?>
Create a User ::
##parent-placeholder-3c6de1b7dd91465d437ef415f94f36afc1fbc8a8##
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<p>This page will do a system check to make sure your configuration looks correct. We'll add your first user on the next page. </p>

<table class="table">
  <thead>
    <tr>
      <th class="col-lg-2">Setting</th>
      <th class="col-lg-1">Valid</th>
      <th class="col-lg-9">Notes</th>
    </tr>
  </thead>
  <tbody>
    <tr <?php echo ($start_settings['url_valid']) ? ' class="success"' : ' class="danger"'; ?>>
      <td>URL</td>
      <td>
        <?php if($start_settings['url_valid']): ?>
          <i class="fa fa-check preflight-success"></i>
        <?php else: ?>
          <i class="fa fa-times preflight-error"></i>
        <?php endif; ?>
      </td>
      <td>
        <?php if($start_settings['url_valid']): ?>
          That URL looks right! Good job!
        <?php else: ?>
          Uh oh! Snipe-IT thinks your URL is <?php echo e($start_settings['url_config']); ?>, but your real URL is <?php echo e($start_settings['real_url']); ?>

          Please update your <code>APP_URL</code> settings in your  <code>.env</code> file
        <?php endif; ?>
      </td>
    </tr>

    <tr <?php echo ($start_settings['db_conn']===true) ? ' class="success"' : ' class="danger"'; ?>>
      <td>Database</td>
      <td>
        <?php if($start_settings['db_conn']===true): ?>
          <i class="fa fa-check preflight-success"></i>
        <?php else: ?>
          <i class="fa fa-times preflight-error"></i>
        <?php endif; ?>
      </td>
      <td>
        <?php if($start_settings['db_conn']===true): ?>
          Great work! Connected to <code><?php echo e($start_settings['db_name']); ?></code>
        <?php else: ?>
          D'oh! Looks like we can't connect to your database. Please update your database settings in your  <code>.env</code> file. Your database says: <code><?php echo e($start_settings['db_error']); ?></code>
        <?php endif; ?>
      </td>
    </tr>

    <tr <?php echo (!$start_settings['env_exposed']) ? ' class="success"' : ' class="danger"'; ?>>
      <td>Config File</td>
      <td>
        <?php if(!$start_settings['env_exposed']): ?>
          <i class="fa fa-check preflight-success"></i>
        <?php else: ?>
          <i class="fa fa-times preflight-error"></i>
        <?php endif; ?>
      </td>
      <td>
        <?php if(!$start_settings['env_exposed']): ?>
          Sweet. It doesn't look like your <code>.env</code> file is exposed to the outside world. (You should double check this in a browser though. You don't ever want anyone able to see that file. Ever. Ever ever.) <a href="../../.env">Click here to check now</a> (This should return a file not found or forbidden error.)
        <?php else: ?>
          Please make sure your <code>.env</code> is not readable by the outside world via web browser. You don't ever want anyone able to see that file. Ever. Ever ever. An exposed <code>.env</code> file can disclose sensitive data about your system and database. <a href="../../.env">Click here to check now</a> (This should return a file not found or forbidden error.)
        <?php endif; ?>
      </td>
    </tr>

    <tr <?php echo ($start_settings['prod']) ? ' class="success"' : ' class="warning"'; ?>>
      <td>Environment</td>
      <td>
        <?php if($start_settings['prod']): ?>
          <i class="fa fa-check preflight-success"></i>
        <?php else: ?>
          <i class="fa fa-times preflight-error"></i>
        <?php endif; ?>
      </td>
      <td>
        <?php if($start_settings['prod']): ?>
          Your app is set to production mode. Rock on!
        <?php else: ?>
          Your app is set <code><?php echo e($start_settings['env']); ?></code> instead of <code>production</code> mode. If you're not planning on developing on Snipe-IT, please update your <code>APP_ENV</code> settings in your  <code>.env</code> file to <code>production</code>.
        <?php endif; ?>
      </td>
    </tr>

    <tr <?php echo (!$start_settings['owner_is_admin']) ? ' class="success"' : ' class="danger"'; ?>>
      <td>File Owner</td>
      <td>
        <?php if(!$start_settings['owner_is_admin']): ?>
          <i class="fa fa-check preflight-success"></i>
        <?php else: ?>
          <i class="fa fa-times preflight-error"></i>
        <?php endif; ?>
      </td>
      <td>
        <?php if(!$start_settings['owner_is_admin']): ?>
          Your app files are owned by <code><?php echo e($start_settings['owner']); ?></code>. That doesn't look like a default root/admin account. Nice!
        <?php else: ?>
          It looks like your files are owned by <code><?php echo e($start_settings['owner']); ?></code>, which might be a root/admin account. It's never a good idea to run a website with escalated priveliges.
        <?php endif; ?>
      </td>
    </tr>

    <tr <?php echo (!$start_settings['writable']) ? ' class="danger"' : ' class="success"'; ?>>
      <td>Permissions</td>
      <td>
        <?php if($start_settings['writable']): ?>
          <i class="fa fa-check preflight-success"></i>
        <?php else: ?>
          <i class="fa fa-times preflight-error"></i>
        <?php endif; ?>
      </td>
      <td>
        <?php if($start_settings['writable']): ?>
          Yippee! Your app storage directory seems writable.
        <?php else: ?>
          Uh-oh. Your <code><?php echo e(storage_path()); ?></code> directory (or sub-directories within) are not writable by the web-server. Those directories need to be writable by the web server in order for the app to work.
        <?php endif; ?>
      </td>
    </tr>

    <tr <?php echo ($start_settings['debug_exposed']) ? ' class="danger"' : ' class="success"'; ?>>
      <td>Debug</td>
      <td>
        <?php if(!$start_settings['debug_exposed']): ?>
          <i class="fa fa-check preflight-success"></i>
        <?php else: ?>
          <i class="fa fa-times preflight-error"></i>
        <?php endif; ?>
      </td>
      <td>
        <?php if(!$start_settings['debug_exposed']): ?>
          Awesomesauce. Debug is either turned off, or you're running this in a non-production environment. (Don't forget to turn it off when you're ready to go live.)
        <?php else: ?>
          Yikes! You should turn off debug mode unless you encounter any issues. Please update your <code>APP_DEBUG</code> settings in your  <code>.env</code> file
        <?php endif; ?>
      </td>
    </tr>

    <tr <?php echo ($start_settings['gd']) ? ' class="success"' : ' class="warning"'; ?>>
      <td>Image Library</td>
      <td>
        <?php if($start_settings['gd']): ?>
          <i class="fa fa-check preflight-success"></i>
        <?php else: ?>
          <i class="fa fa-times preflight-warning"></i>
        <?php endif; ?>
      </td>
      <td>
        <?php if($start_settings['gd']): ?>
          GD is installed. Go you!
        <?php else: ?>
          The GD library isn't installed. While this won't prevent the system from working, you won't be able to generate labels or upload images.
        <?php endif; ?>
      </td>
    </tr>

    <tr id="mailtestrow" class="warning">
      <td>Email</td>
      <td>
            <a class="btn btn-default btn-sm pull-left" id="mailtest" style="margin-right: 10px;">
                Send Test</a>
      </td>
        <td>
            <span id="mailtesticon"></span>
            <span id="mailtestresult"></span>
            <span id="mailteststatus"></span>
            <div class="col-md-12">
                <div id="mailteststatus-error" class="text-danger"></div>
            </div>
            <div class="col-md-12">
                <p class="help-block">This will attempt to send a test mail to <?php echo e(config('mail.from.address')); ?>.</p>
            </div>
      </td>
    </tr>
  </tbody>
</table>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('button'); ?>
  <form action="<?php echo e(route('setup.migrate')); ?>" method="GET">
    <button class="btn btn-primary">Next: Create Database Tables</button>
  </form>
##parent-placeholder-7b7fcc78d6cd1507925b769b1386ced3683f99c7##
<?php $__env->stopSection(); ?>

<?php $__env->startSection('moar_scripts'); ?>
<script type="text/javascript">
    $(document).ready(function () {

        // Test Mail

        $("#mailtest").click(function(){

            $("#mailtestrow").removeClass('success').removeClass('danger').removeClass('warning');
            $("#mailtestrow").addClass('info');
            $("#mailtesticon").html('');
            $("#mailteststatus").html('');
            $('#mailteststatus-error').html('');
            $("#mailtesticon").html('<i class="fa fa-spinner spin"></i> Sending Test Email...');

            $.ajax({
                url: "<?php echo e(route('setup.mailtest')); ?>",

                success: function (result) {
                    if (result.status == 'success') {
                        $("#mailtestrow").removeClass('info').removeClass('danger').removeClass('warning');
                        $("#mailtestrow").addClass('success');
                        $("#mailtesticon").html('');
                        $("#mailteststatus").html('');
                        $('#mailteststatus-error').html('');
                        $("#mailteststatus").removeClass('text-danger');
                        $("#mailteststatus").addClass('text-success');
                        $("#mailteststatus").html('<i class="fa fa-check text-success"></i> Mail sent to <?php echo e(config('mail.from.address')); ?>!');
                    } else {
                        $("#mailtestrow").removeClass('success').removeClass('info').removeClass('warning');
                        $("#mailtestrow").addClass('danger');
                        $("#mailtesticon").html('<i class="fa fa-check preflight-error"></i>');
                        $("#mailtestresult").html('Something went wrong. Your email was not sent. Check your mail settings in your <code>.env</code> file.');

                    }


                },
                error: function (result) {
                    $("#mailtestrow").removeClass('success').removeClass('info').removeClass('warning');
                    $("#mailtestrow").addClass('danger');
                    $("#mailtesticon").html('');
                    $("#mailteststatus").html('');
                    $('#mailteststatus-error').html('');
                    $("#mailteststatus").removeClass('text-success');
                    $("#mailteststatus").addClass('text-danger');
                    $("#mailtesticon").html('<i class="fa fa-exclamation-triangle text-danger"></i>');
                    $('#mailteststatus').html('Mail could not be sent.');
                    if (result.responseJSON) {
                        $('#mailteststatus-error').html('Error: ' + result.responseJSON.messages);
                    } else {
                        console.dir(data);
                    }
                }

            });


        });
 });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/setup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>