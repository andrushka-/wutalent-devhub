<?php  require_once('config.inc.php'); ?>
<link href="<?php echo HTTP_SSL.'://'.wuDomain.'/static/styles/plugin/plugin.css';?>" rel="stylesheet" />
<link href="mailchimp.css" rel="stylesheet" />
<script>var wuDomain ='<?php echo wuDomain; ?>';</script>
<div id="content">
  <?php /* Form for get mailchimp key from user*/
  	if($_REQUEST['key'] != '')	$_POST['apikey'] = $_REQUEST['key'];
	require_once('views/keyForm.php');	
	if(isset($_POST['apikey']))	// if user has posted submit the form
	{
		extract($_POST);	// grab the posted varibale list
		require_once('libraries/MaichimpConnect.php');
		$mailchimpConnect = new MailchimpConnect($apikey);
		$mailchimp = $mailchimpConnect->getMailchimpList();
		if($mailchimp['error'])
		{
			echo $mailchimp['list'];	// display error message
		}
		else 	// prepare the mailchimp list and assign it to js's mailChimpList variable
		{
			?><script>var mailChimpList = '<?php echo $mailchimp['list'];?>';</script><?php
			require_once('views/contactRecords.php');
		}
	} ?>	
</div>
