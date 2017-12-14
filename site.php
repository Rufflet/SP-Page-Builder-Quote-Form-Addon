<?php
/**
 * @package SP Page Builder Quote Form addon
 * @author Alexander Yershov (https://www.upwork.com/o/profiles/users/_~0175333b8b4aefa403/)
*/
//no direct accees
defined ('_JEXEC') or die ('restricted access');

class SppagebuilderAddonQuote_form extends SppagebuilderAddons{

	public function render() {

		$class = (isset($this->addon->settings->class) && $this->addon->settings->class) ? $this->addon->settings->class : '';
		$title = (isset($this->addon->settings->title) && $this->addon->settings->title) ? $this->addon->settings->title : '';
		$heading_selector = (isset($this->addon->settings->heading_selector) && $this->addon->settings->heading_selector) ? $this->addon->settings->heading_selector : 'h3';

		//Addon options (moved to Ajax)
		$recipient_email = (isset($this->addon->settings->recipient_email) && $this->addon->settings->recipient_email) ? $this->addon->settings->recipient_email : '';
		$from_email = (isset($this->addon->settings->from_email) && $this->addon->settings->from_email) ? $this->addon->settings->from_email : '';
		$from_name = (isset($this->addon->settings->from_name) && $this->addon->settings->from_name) ? $this->addon->settings->from_name : '';

		//Output
		$fieldset = file_get_contents(__DIR__ . '/form.php');
		
		$output  = '<div class="sppb-addon sppb-addon-qouteform ' . $class . '">';
		$output .= ($title) ? '<'.$heading_selector.' class="sppb-addon-title">' . $title . '</'.$heading_selector.'>' : '';
		$output .= '<div class="sppb-addon-content">';
		$output .= '<form role="form" id="cctv-form" class="form-horizontal" enctype="multipart/form-data">';
		$output .= $fieldset;

		$output .= '<input type="hidden" name="recipient" value="'. base64_encode($recipient_email) .'">';
		$output .= '<input type="hidden" name="from_email" value="'. base64_encode($from_email) .'">';
		$output .= '<input type="hidden" name="from_name" value="'. base64_encode($from_name) .'">';

		$output .= '</form>';
		$output .= '<div style="display:none;margin-top:10px;" class="sppb-quote-form-status"></div>';
		$output .= '</div>';
		$output .= '</div>';

		return $output;

	}

	public static function getAjax() {
		
		$input = JFactory::getApplication()->input;
		$mail = JFactory::getMailer();

		//inputs
		$inputs = $input->get('data', array(), 'ARRAY');
		
		//features
		$features = [];

		//features
		$pics = [];

		foreach ($inputs as $input) {

			if( $input['name'] == 'firstname' ) {
				$firstname 					= $input['value'];
			}
			
			if( $input['name'] == 'lastname' ) {
				$lastname 					= $input['value'];
			}

			if( $input['name'] == 'companyfield' ) {
				$companyfield 				= $input['value'];
			}

			if( $input['name'] == 'phonenum' ) {
				$phonenum 					= $input['value'];
			}

			if( $input['name'] == 'phoneext' ) {
				$phoneext 					= $input['value'];
			}

			if( $input['name'] == 'emailfield' ) {
				$emailfield 				= $input['value'];
			}

			if( $input['name'] == 'preferredcontact' ) {
				$preferredcontact			= $input['value'];
			}

			if( $input['name'] == 'locationtype' ) {
				$locationtype 				= $input['value'];
			}

			if( $input['name'] == 'locationmaterial' ) {
				$locationmaterial 			= $input['value'];
			}

			if( $input['name'] == 'inoutdoor' ) {
				$inoutdoor 					= $input['value'];
			}

			if( $input['name'] == 'cameratype' ) {
				$cameratype 				= $input['value'];
			}

			if( $input['name'] == 'cameras' ) {
				$cameras 					= $input['value'];
			}

			if( $input['name'] == 'daysofrec' ) {
				$daysofrec 					= $input['value'];
			}

			if( $input['name'] == 'monitorneeded' ) {
				$monitorneeded 				= $input['value'];
			}

			if( $input['name'] == 'monitorsize' ) {
				$monitorsize 				= $input['value'];
			}

			if( $input['name'] == 'mountedon' ) {
				$mountedon 					= $input['value'];
			}

			if( $input['name'] == 'internetconnection' ) {
				$internetconnection 		= $input['value'];
			}

			if( $input['name'] == 'planinternetconnection' ) {
				$planinternetconnection 	= $input['value'];
			}

			if( $input['name'] == 'internetconnectiontype' ) {
				$internetconnectiontype 	= $input['value'];
			}

			if( $input['name'] == 'installationdate' ) {
				$installationdate 			= $input['value'];
			}

			if( $input['name'] == 'dateandtime' ) {
				$dateandtime 				= $input['value'];
			}

			if( $input['name'] == 'features[]' ) {
				$features[]					= $input['value'];
			}

			if( $input['name'] == 'pics[]' ) {
				$pics[]						= $input['value'];
			}

			if( $input['name'] == 'additionalinfo' ) {
				$additionalinfo 			= nl2br( $input['value'] );
			}

			if( $input['name'] == 'recipient' ) {
				$recipient 					= base64_decode($input['value']);
			}

			if( $input['name'] == 'from_email' ) {
				$from_email 				= base64_decode($input['value']);
			}

			if( $input['name'] == 'from_name' ) {
				$from_name 					= base64_decode($input['value']);
			}

			if( $input['name'] == 'totalamount' ) {
				$totalamount				= $input['value'];
			}
		}

		$message .= 'Form details:' . PHP_EOL;
		$message .= 'Name: ' . $firstname;
		$message .= (empty($lastname)) ? PHP_EOL : ' ' . $lastname . PHP_EOL;
		
		if (!empty($companyfield)) {
			$message .= 'Company: ' . $companyfield . PHP_EOL;
		}

		//$message .= 'Phone number: ' . $phonenum . ' ext: ' . $phoneext . PHP_EOL;
		if (!empty($phonenum)) {
			$message .= 'Phone number: ' . $phonenum;
		}
		$message .= (empty($phoneext)) ? PHP_EOL : ' ext: ' . $phoneext . PHP_EOL;
		
		$message .= 'Email Address: ' . $emailfield . PHP_EOL;

		//$message .= 'Preferred method of contact: ' . $preferredcontact . PHP_EOL;
		if (!empty($preferredcontact)) {
			$message .= 'Preferred method of contact: ' . $preferredcontact . PHP_EOL;
		}
		
		//Location Block
		//$message .= 'Type of location: ' . $locationtype . PHP_EOL;
		if (!empty($locationtype)) {
			$message .= 'Type of location: ' . $locationtype . PHP_EOL;
		}
		//$message .= 'Location material: ' . $locationmaterial . PHP_EOL;
		if (!empty($locationmaterial)) {
			$message .= 'Location material: ' . $locationmaterial . PHP_EOL;
		}
		//$message .= 'Indoor, outdoor or both: ' . $inoutdoor . PHP_EOL;
		if (!empty($inoutdoor)) {
			$message .= 'Indoor, outdoor or both: ' . $inoutdoor . PHP_EOL;
		}

		//Cams Block
		//$message .= 'Type of camera: ' . $cameratype . PHP_EOL;
		if (!empty($cameratype)) {
			$message .= 'Type of camera: ' . $cameratype . PHP_EOL;
		}
		//$message .= 'How many cameras: ' . $cameras . PHP_EOL;
		if (!empty($cameras)) {
			$message .= 'How many cameras: ' . $cameras . PHP_EOL;
		}
		//$message .= 'How many days of recording: ' . $daysofrec . PHP_EOL;
		if (!empty($camerasdaysofrecquality)) {
			$message .= 'How many days of recording: ' . $daysofrec . PHP_EOL;
		}

		//Monitor Block
		//$message .= 'Monitor needed to view cameras? ' . $monitorneeded . PHP_EOL;
		if (!empty($monitorneeded)) {
			$message .= 'Monitor needed to view cameras? ' . $monitorneeded . PHP_EOL;
		}
		//$message .= 'Monitor Size: ' . $monitorsize . PHP_EOL;
		if (!empty($monitorsize)) {
			$message .= 'Monitor Size: ' . $monitorsize . PHP_EOL;
		}
		//$message .= 'Mounted on: ' . $mountedon . PHP_EOL;
		if (!empty($mountedon)) {
			$message .= 'Mounted on: ' . $mountedon . PHP_EOL;
		}

		//Internet Connection Block
		//$message .= 'Do you have internet connection? ' . $internetconnection . PHP_EOL;
		if (!empty($internetconnection)) {
			$message .= 'Do you have internet connection? ' . $internetconnection . PHP_EOL;
		}
		//$message .= 'What type of internet? ' . $internetconnectiontype . PHP_EOL;
		if (!empty($internetconnectiontype)) {
			$message .= 'What type of internet? ' . $internetconnectiontype . PHP_EOL;
		}
		//$message .= 'Do you plan on having Internet connection by install date? ' . $planinternetconnection . PHP_EOL;
		if (!empty($planinternetconnection)) {
			$message .= 'Do you plan on having Internet connection by install date? ' . $planinternetconnection . PHP_EOL;
		}
		
		//Dates Block
		//$message .= 'Installation date: ' . $installationdate . PHP_EOL;
		if (!empty($installationdate)) {
			$message .= 'Installation date: ' . $installationdate . PHP_EOL;
		}
		//$message .= 'Please choose date and time: ' . $dateandtime . PHP_EOL;
		if (!empty($planinternetcodateandtimennection)) {
			$message .= 'Please choose date and time: ' . $dateandtime . PHP_EOL;
		}
		
		//Features Block
		$featuresCounter = count($features);
		if (!empty($featuresCounter)) {
			$message .= 'Checklist of additional features: ' . PHP_EOL;
			for($i=0; $i < $featuresCounter; $i++)
			{
				$message .= ' - ' . $features[$i] . PHP_EOL;
			}
		}
		
		//pics Block
		$picsCounter = count($pics);
		if (!empty($picsCounter)) {
			$message .= 'Pics of location: ' . PHP_EOL;
			for($i=0; $i < $picsCounter; $i++)
			{
				$message .= ' - ' . $pics[$i] . PHP_EOL;
			}
		}

		//Additional field(s) block
		//$message .= 'Any Additional Information: ' . PHP_EOL . $additionalinfo . PHP_EOL;
		if (!empty($additionalinfo)) {
			$message .= 'Any Additional Information: ' . PHP_EOL . $additionalinfo . PHP_EOL;
		}

		//Total Amount
		if (!empty($totalamount)) {
			$message .= 'Total amount (calculated): ' . $totalamount . PHP_EOL;
		}

		$message = nl2br( $message );

		$output = array();
		$output['status'] = false;

		$sender = array($emailfield, $firstname . ' ' . $lastname);
		
		if (!empty($from_email)) {
			$sender = array($from_email, $from_name);
			$mail->addReplyTo($emailfield, $firstname . ' ' . $lastname);
		}
		
		$mail->setSender($sender);
		$mail->addRecipient($recipient);
		$mail->setSubject('Quote form'); //TODO move to form params
		$mail->isHTML(true);
		$mail->Encoding = 'base64';
		$mail->setBody($message);

		//Attachments
		if (!empty($picsCounter)) {
			for($i=0; $i < $picsCounter; $i++)
			{
				$mail->addAttachment(JURI::base(true) . 'uploads/files/' .$pics[$i]);
			}
		}

		if ($mail->Send()) {
			$output['status'] = true;
			$output['content'] = '<span class="sppb-text-success">'. JText::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_SUCCESS') .'</span>';
			//Delete Attachments
			if (!empty($picsCounter)) {
				for($i=0; $i < $picsCounter; $i++)
				{
					JFile::delete(JURI::base(true) . 'uploads/files/' .$pics[$i]);
				}
			}
		} else {
			$output['content'] = '<span class="sppb-text-danger">'. JText::_('COM_SPPAGEBUILDER_ADDON_AJAX_CONTACT_FAILED') .'</span>';
			//Delete Attachments
			if (!empty($picsCounter)) {
				for($i=0; $i < $picsCounter; $i++)
				{
					JFile::delete(JURI::base(true) . 'uploads/files/' .$pics[$i]);
				}
			}
		}

		return json_encode($output);
	}

	

	public function stylesheets() {
		$app    = JFactory::getApplication();
		return array(
			JURI::base(true) . '/templates/' . $app->getTemplate() . '/sppagebuilder/addons/quote_form/assets/css/bootstrap-datetimepicker.min.css'
		);
	}

	public function scripts() {
		
		$app    = JFactory::getApplication();
		return array(
			JURI::base(true) . '/templates/' . $app->getTemplate() . '/sppagebuilder/addons/quote_form/assets/js/moment.min.js',
			JURI::base(true) . '/templates/' . $app->getTemplate() . '/sppagebuilder/addons/quote_form/assets/js/bootstrap-datetimepicker.min.js',
			JURI::base(true) . '/templates/' . $app->getTemplate() . '/sppagebuilder/addons/quote_form/assets/js/jquery.ui.widget.js',
			JURI::base(true) . '/templates/' . $app->getTemplate() . '/sppagebuilder/addons/quote_form/assets/js/jquery.iframe-transport.js',
			JURI::base(true) . '/templates/' . $app->getTemplate() . '/sppagebuilder/addons/quote_form/assets/js/jquery.fileupload.js',
			JURI::base(true) . '/templates/' . $app->getTemplate() . '/sppagebuilder/addons/quote_form/assets/js/jquery.fileupload-process.js',
			JURI::base(true) . '/templates/' . $app->getTemplate() . '/sppagebuilder/addons/quote_form/assets/js/jquery.fileupload-validate.js',
			JURI::base(true) . '/templates/' . $app->getTemplate() . '/sppagebuilder/addons/quote_form/assets/js/app.js'
		);
	}

	public function css() {
		$css = '.btn-default.active { background: #222 !important; }';

		return $css;
	}

}
