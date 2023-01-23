<?php

/*
 * @Obfuscator version: 0.1
 * @Project Started: 01/18/2023
 * @author: Raivis Petersons ( Narvulkan )
 * @TryOut Website: https://php_obf.com/
 * 
*/

try {
	
	# Set Error Reporting All Except E_NOTICE
	error_reporting(E_ALL & ~E_NOTICE);

	# Start OB
	ob_start();

	# Start Session
	session_start();

	# Set Default Encoding	
	@ini_set('default_charset', 'utf-8');

	# Set Default TimeZone
	date_default_timezone_set('UTC');

	# OBF Version
	define('version','0.1');

	# Donate Page Display Thanks Message
	if(isset($_GET['thanks'])){

		$setThanks = '<div class="alert alert-success alert-white rounded"><div class="icon"><i class="fa fa-beer" aria-hidden="true"></i></div><strong> Thanks </strong> For Supporting This Project, Wish you all the best :) </div>';
	
	} else { $setThanks = ''; };

	# Check & Redefine Post To Display On HTML ( Unknonw If There Is Better Way To Load Settings & Code After Post )
	if(isset($_POST['obf_start'])){

		$sourceCode = htmlentities($_POST['obf_code_single']);

	} else {

		$sourceCode = '';

	};

	# Load Template Head And Top Body Sections
	echo '
<html>
<head>
	<meta charset="utf-8">
	<title>PHP Code - Obfuscator</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css">
	<link href="assets/style.css" rel="stylesheet">
</head>
<body>
	<div class="top-head">
		<div style="float:left;width:70%;">
			<div style="height:80px;line-height:80px;font-size:17px;">
				This is a GitHub Project and you can get complete source from there
				<a target="_blank" href="https://github.com/fabilus22/php-code-obfuscator">GITHUB</a>
			</div>
		</div>
		<div style="float:right;width:30%;text-align:right;">
			<div style=""></div>
			<a href="https://www.paypal.com/donate/?hosted_button_id=8D8A9A8A9QY58">
				<img style="width: 200px;" src="assets/PayPal-donate.png">
			</a>
		</div>
		<div style="clear:both;"></div>
	</div>
	<div id="cont_wrap">
		<div class="top-info">
			<p style="font-size:19px;"><b>PHP Code Obfuscator</b></p><br>
			Hi & Welcome! <small>This is easy to use php obfuscator coded in PHP and specific for php files that use echo and print instead of closing and opening php tags.</small>
			<br>
			Goal of obfuscation is to make codes different then original source and prevent anyone from editing them specially if they do not understand coding.
			<br>
			
		</div>
		<div class="content">

			'.$setThanks.' <!-- Display Donation Thanks -->

			<form action="" method="post" enctype="multipart/form-data" id="56853475437543">
				<input name="obf_start" type="hidden"/>

				<!-- For Now File Uploading Disabled
					<label for="pwd"><h3>Zip Archived Website php code Obfuscation</h3></label>
					<label for="file-upload" class="ctb-file-upload">
						<i class="fa fa-upload" aria-hidden="true"></i> Upload Zip
					</label><span id="file_name_output" style="margin-left:10px;"></span>
					<input id="file-upload" name="UploadedZipFile" type="file"/>
				-->

				<div style="height:30px;"></div>

				<label for="pwd"><h3>Single PHP Code Obfuscation <small><small>( Soon Available Also Full Website Obfuscation With Many PHP Files. )</small></small> </h3></label>
				<textarea name="obf_code_single" placeholder="Enter PHP Source Code" id="editing" spellcheck="false">'.$sourceCode.'</textarea>

				<div style="height:30px;"></div>

				<label for="pwd"><h3>Obfuscation Settings</h3></label>

				<div class="group">
					<label for="pwd">
					<b>Rename Functions</b>:
						<input type="checkbox" name="rn_fnc_name" style="width: 16px;height: 16px;cursor: pointer;" checked />
					Min Len:
						<input name="rn_fnc_name_len_min" style="width: 65px;height: 25px;cursor: pointer;" value="32" />
					Max Len:
						<input name="rn_fnc_name_len_max" style="width: 65px;height: 25px;cursor: pointer;" value="64" />
					</label>
				</div>
				<br>
				<div class="group">
					<label for="pwd">
					<b>Rename Variables</b>:
						<input type="checkbox" name="rn_var_name" style="width: 16px;height: 16px;cursor: pointer;" checked />
					Min Len:
						<input name="rn_var_name_len_min" style="width: 65px;height: 25px;cursor: pointer;" value="32" />
					Max Len:
						<input name="rn_var_name_len_max" style="width: 65px;height: 25px;cursor: pointer;" value="64" />
					</label>
				</div>
				<br>
				<div class="group">
					<label for="pwd">
					<b>Code Space/Tab Remove And Replace</b>:
						<input type="checkbox" name="use_space_tab_rem" style="width: 16px;height: 16px;cursor: pointer;" checked />
					</label>
				</div>
				<br>
				<div class="group">
					<label for="pwd">
					<b>HTML Encode/Decode Tags</b>:
						<input type="checkbox" name="use_html_ende_tags" style="width: 16px;height: 16px;cursor: pointer;" checked />
					Add Random HTML Comments:
						<input type="checkbox" name="use_html_ende_comments" style="width: 16px;height: 16px;cursor: pointer;" checked />
					</label>
				</div>
				<br>
				<div class="group">
					<label for="pwd">
					<b>Encode/Decode Code</b>:
						<input type="checkbox" name="use_encode_w_eval" style="width: 16px;height: 16px;cursor: pointer;" checked />
					Type:
						<select name="use_encode_w_eval_type" style="width: 355px;height: 25px;cursor: pointer;">
							<option value="1">str_rot13(base64_encode(base64_encode(gzdeflate(</option>
							<option value="2">str_rot13(strrev(base64_encode(gzdeflate(</option>
							<option value="3">base64_encode(str_rot13(gzdeflate(str_rot13(</option>
							<option value="4" selected>base64_encode(gzdeflate(</option>
						</select>
					</label>
				</div>
				<br>
				<div class="group">
					<label for="pwd">
					<b>Add Header Text In All php Files Or Code</b>:
					<textarea name="header_top" id="header_top" placeholder="* My Code Name
* @version 0.1
* @author Narvulkan
* https://my.website.com/
* @copyright (c) 2023 MyWeb, All Rights Reserved" spellcheck="false"></textarea>
					</label>
				</div>

				<div style="height:40px;"></div>

				<center>
					<button type="button" class="button" id="btn_obf_start" onclick="document.getElementById(\'56853475437543\').submit();"><i class="fa fa-compress" aria-hidden="true"></i> Start Obfuscate Process</button>
				</center>
			</form>
			<div style="height:50px;"></div>
			<div id="result_output_div">
	';

	# Function To Generate Random Variable And Function Names
	function generateName($len){

		# Random Mixed Character To Use
		$characters = '______0123456789_____ABCDEFG__HIJKLMNO_______0123456789_____PQRSTUVW__XYZ';
	
		$charactersLength = strlen($characters);
		$randomString = '_';
		
		# Loop & Add Letters/Symbols In One String
		for($i = 0; $i < $len; $i++){
			
			$randomString .= $characters[rand(0,$charactersLength - 1)];
			
		};

		return $randomString;

	};

	# Function To Generate Random Spaces For Haotic Results
	function generateRandSpaces($len){

		# Random Spacing Create
		$randspaces = '';

		for($i = 0; $i < $len; $i++){
			
			$randspaces .= ' ';
			
		};

		return $randspaces;

	};

	# Defined Error And Success For Better Visuals
	$Err_S = '<div class="alert alert-warning alert-white rounded"><div class="icon"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div><strong>Alert!</strong>'; $Err_E = '</div>';

	# Set Default
	$scrollBottom = 0;

	# Incoming POST Processing & File Obfuscation
	if(isset($_POST['obf_start'])){

		# A JS Scroll TO Bottom Init Key After Post Sent ( unknown if there is a better way )
		$scrollBottom = 1;

		# Create Unique Session While Processing Files
		define("MySessionID",rand(100,9999999));

		# Set Error Code Default
		$error = 0;
		
		# Check If TextArea Is Empty Else Ignore Zip Upload
		$is_OBF_Single = ($_POST['obf_code_single'] === '') ? 0:1;
		$is_OBF_Zip = 0; # DISABLED FOR NOW ($_FILES["UploadedZipFile"]["name"] === '') ? 0:1;
		
		# Load TextArea Content OR Zip File Depending On Added Info
		if($is_OBF_Single == 1){

			# Set Folder Name For Single OBF Case
			$obf_path_unpacked = 'files/';
			$obf_path_packed = 'files/';

			# Single OBF Content Stored To PHP File To Avoid Duplicated Process For Each Upload Case And As TXT Instead Of PHP TO Avoid PHP File Execute On Webhost
			file_put_contents($obf_path_unpacked."obf_single_".MySessionID.".txt",$_POST['obf_code_single']); chmod($obf_path_unpacked."obf_single_".MySessionID.".txt", 0755);
			$for_array_file_loop = array('obf_single_'.MySessionID.'.txt');

		} elseif($is_OBF_Zip == 1){

			# Set Folder Name For Multiple File OBF Case
			$obf_path_unpacked = 'files/unpacked/';
			$obf_path_packed = 'files/packed/';

			# Check ZIp Archive, Extract & Prepare Array With PHP Path

			# Full Path Where To Extract Zip
			$to_upload_file_path = $obf_path_unpacked.''.MySessionID.'/'.basename($_FILES["UploadedZipFile"]["name"]);
			
			# Check Zip Archive Size Else Send To End If To Large ( Default Max 32mb )
			if($_FILES["UploadedZipFile"]["size"] >= 33554432){

				# File Size Is To Big And Is Not Allowed To Upload, Exit Code.
				$error = 100; goto End;

			};

			# Set Empty Array In Case Issue On Zip Extracting
			$for_array_file_loop = array();

			# Init Zip Extension
			$zip_file = new ZipArchive;
			
			# Open Zip And Check If Valid Before Extracting
			$result = $zip_file->open($_FILES["UploadedZipFile"]["tmp_name"]);
			if($result === TRUE){

				# Create Array Of PHP Files To Obfuscate Before Extract & Count PHP Files, If 0 Then Go To End
				$php_cnt = 0; for( $in = 0; $in < $zip_file->numFiles; $in++){

						$file_info = $zip_file->statIndex($in);
						$file_type = pathinfo($file_info['name'],PATHINFO_EXTENSION);

						if($file_type === 'php'){
							
							$for_array_file_loop[] = ''.MySessionID.'/'.$file_info['name'];
							$php_cnt ++;
						};
				};

				if($php_cnt === 0){

					# Zip File Did Not Contain Any PHP File To Continue, Exit Code.
					$error = 101; goto End;

				} else {

					# Extract Zipped Files
					$zip_file->extractTo($obf_path_unpacked.''.MySessionID.'/');

				};

			} else {

				# Opened Zip Was Not Valid And Failed To Extract, Exit Code.
				$error = 102; goto End;

			};

		} else {

			# Both TextArea And Upload Are Empty, Exit Code.
			$error = 103; goto End;

		};
		
		# List Of HTML Tags To Search And Replace
		$htmlTagList = array("a","abbr","acronym","address","applet","area","article","aside","audio","b","base","basefont","bdi","bdo","bgsound","big","blink","blockquote","body","br","button","canvas","caption","center","cite","code","col","colgroup","content","data","datalist","dd","decorator","del","details","dfn","dir","div","dl","dt","element","em","embed","fieldset","figcaption","figure","font","footer","form","frame","frameset","h1","h2","h3","h4","h5","h6","head","header","hgroup","hr","html","i","iframe","img","input","ins","isindex","kbd","keygen","label","legend","li","link","listing","main","map","mark","marquee","menu","menuitem","meta","meter","nav","nobr","noframes","noscript","object","ol","optgroup","option","output","p","param","plaintext","pre","progress","q","rp","rt","ruby","s","samp","script","section","select","shadow","small","source","spacer","span","strike","strong","style","sub","summary","sup","table","tbody","td","template","textarea","tfoot","th","thead","time","title","tr","track","tt","u","ul","var","video","wbr","xmp");
			
		# Set Default Starting ID For File Counting in Foreach Arrays
		$i = 0; $numech = 0; $numechP = 0;

		# Search For Functions In All Files, For a Reason That Regex Gives To Many False Positive Results.
		$sesListOfFunctions = Array();
		foreach($for_array_file_loop as $array_file){

			# Load File
			$getFileToClean = file_get_contents($obf_path_unpacked.''.$array_file);

			preg_match_all('/(?<=function ).*?\b\w+\s*\(/', $getFileToClean, $sesFuncArrays); # Searching Specific IF Has Name Function

			foreach($sesFuncArrays[0] as $sesArrSet){

				if($sesArrSet == '__construct(') { continue; };	# Skip If Class Contruct Function 

				$sesArrSet = str_replace('(','',$sesArrSet);
				$sesListOfFunctions[''.$sesArrSet.''] = $sesArrSet;

			};

		};

		# Run Foreach To Loop All Files Of ZIP To Obfuscate Or Single File Obfuscate
		foreach($for_array_file_loop as $array_file){

			# Load File
			$getFileToClean = file_get_contents($obf_path_unpacked.''.$array_file);

			# Adding New Line In Case Comment Tag At Bottom
			$getFileToClean = $getFileToClean.''.PHP_EOL;

			# Replace Url Cases & Other Cases With // And # To Avoid Removing Them ( sadly regex is not my speciality )
			$getFileToClean = str_replace('https://', 'https:@@', $getFileToClean);
			$getFileToClean = str_replace('http://', 'http:@@', $getFileToClean);

			# Remove Single Line Comments & Multi-Line Comments ( Added New Line Replace Else It Removes And In Some Cases May Not Remove And Can break code )
			# Additional Note: It is bad to leave comments inside comments !!
			$getFileToClean = preg_replace('![ \n\r\t]+#.*[ \t]*[\r\n]!', "\n", $getFileToClean);  # Removing # Line Comments
			$getFileToClean = preg_replace('!\/\*.*?\*\/!s', "\n", $getFileToClean); # Removing PHP Comments /* */ and /*  \n  */
			$getFileToClean = preg_replace('![ \n\r\t]\/\/.*[ \t]*[\r\n]!', "\n", $getFileToClean);  # Removing // Line Comments
			$getFileToClean = preg_replace('~\<\!\-\-(.*?)\-\-\>~s', "\n", $getFileToClean); # Removing HTML Comment Lines
			$getFileToClean = preg_replace('~//<!\[CDATA\[\s*|\s*//\]\]>~', "\n", $getFileToClean); # Removing CDATA Blocks
			$getFileToClean = preg_replace('/\n\s*\n/', "\n", $getFileToClean);  # Removing New Lines And Replaces With Single Line

			# Replacing PHP Start And End Code To Prevent Issue With HTMl Entities
			$getFileToClean = str_replace('<?php','', $getFileToClean);
			$getFileToClean = str_replace('<?','', $getFileToClean);
			$getFileToClean = str_replace('?>','', $getFileToClean);

			# Saving File Back To Unpacked Folder
			file_put_contents($obf_path_unpacked.''.$array_file,$getFileToClean); chmod($obf_path_unpacked.''.$array_file, 0755);


			# Open & Read Files Line By Line
			$php_code[$i] = fopen($obf_path_unpacked.''.$array_file, "r");

			while(($line_code = fgets($php_code[$i])) !== false){

				# Search For Variable Names & Store On Array
				preg_match_all('/\$([a-zA-Z\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/', $line_code, $sesVarArrays); # Does not Support If Variable has - Symbol ( a better regex needed )
				$setVarArrCase = Array();
				foreach($sesVarArrays[0] as $sesArrFix){
					
					if($sesArrFix == '$this') { continue; };	# Skip If Var Name Is This

					$setVarArrCase[''.$sesArrFix.''] = $sesArrFix;

				};

				# Checking If Array Is Not Empty Else It Gives Error On Array Sort
				if(count($setVarArrCase) >= 1 && $_POST['rn_var_name'] == true){

					if($_POST['rn_var_name_len_min'] > 200 ) { $setMin = 1; } else {
						if($_POST['rn_var_name_len_min'] > $_POST['rn_var_name_len_max'] ) { $setMin = 1; } else { $setMin = $_POST['rn_var_name_len_min']; }; # Just had to Add This, There are morans who add min more then max.
					};
					if($_POST['rn_var_name_len_max'] > 200 ) { $setMax = 200; } else { $setMax = $_POST['rn_var_name_len_max']; };
					
					# Fixing Sort To Read By Longest String First ( if Short String Then it May Replace Wrong var )
					$keys = array_map('strlen', array_keys($setVarArrCase));
					array_multisort($keys, SORT_DESC, $setVarArrCase);

					$cntVar = 1;
					foreach($setVarArrCase as $sesVarArrays){

						if($varArrayGlb['var_saved'][''.$sesVarArrays.''] != ""){
							
							$line_code = str_replace($sesVarArrays,$varArrayGlb['var_saved'][''.$sesVarArrays.''],$line_code);

						} else {

							$NewNamelen = rand($setMin,$setMax) + $cntVar; # For Future To Add Option For This Value Changing From Template.

							$varArrayGlb['var_saved'][''.$sesVarArrays.''] = '$'.generateName($NewNamelen);

							$line_code = str_replace(''.$sesVarArrays.'',$varArrayGlb['var_saved'][''.$sesVarArrays.''],$line_code);

						};

						$cntVar ++;

					};

				};

				# Checking If Array Is Not Empty Else It Gives Error On Array Sort
				if(count($sesListOfFunctions) >= 1 && $_POST['rn_fnc_name'] == true){

					if($_POST['rn_fnc_name_len_min'] > 200 ) { $setMin = 1; } else {
						if($_POST['rn_fnc_name_len_min'] > $_POST['rn_fnc_name_len_max'] ) { $setMin = 1; } else { $setMin = $_POST['rn_fnc_name_len_min']; }; # Just had to Add This, There are morans who add min larger then max.
					};
					if($_POST['rn_fnc_name_len_max'] > 200 ) { $setMax = 200; } else { $setMax = $_POST['rn_fnc_name_len_max']; };

					# Fixing Sort To Read By Longest String First ( if Short String Then it May Replace Wrong function )
					$keys = array_map('strlen', array_keys($sesListOfFunctions));
					array_multisort($keys, SORT_DESC, $sesListOfFunctions);

					$cntFn = 1;
					foreach($sesListOfFunctions as $sesFuncArrays){
						
						if($varArrayGlb['func_saved'][''.$sesFuncArrays.''] != ""){
							
							$line_code = str_replace($sesFuncArrays,$varArrayGlb['func_saved'][''.$sesFuncArrays.''],$line_code);

						} else {

							$NewNamelen = rand($setMin,$setMax) + $cntFn; # For Future To Add Option For This Value Changing From Template.

							$varArrayGlb['func_saved'][''.$sesFuncArrays.''] = ''.generateName($NewNamelen);

							$line_code = str_replace(''.$sesFuncArrays.'',$varArrayGlb['func_saved'][''.$sesFuncArrays.''],$line_code);

						};

						$cntFn ++;

					};

				};

//.. Need to Rename Classes Also!! ( Using Variable Array To Set Class Names )

				# Fixing Urls & Other Case Replace
				$line_code = str_replace('https:@@', 'https://', $line_code);
				$line_code = str_replace('http:@@', 'http://', $line_code);

				# Add Line Code Else Set Empty
				if($line_code === ""){

					$setLineCode[$i][] = "";

				} else {

					$setLineCode[$i][] = $line_code;

				};


			};

			# Closing fopen
			fclose($php_code[$i]);
			
			# Combines Line Array As One
			$php_code_combined = implode('',$setLineCode[$i]);

			# Replace HTML Tags Only ( Issues When Use htmlentities() with Symbol Replacing On PHP Code & JS )
			if($_POST['use_html_ende_tags'] == true){
				foreach($htmlTagList as $htmlTagl){
					
					if($_POST['use_html_ende_comments'] == true){

						$htmlEntitlTagsRand = '<!-- '.generateRandSpaces(rand(5,20)).'Entitled '.generateName(rand(5,20)).'HTML '.generateRandSpaces(rand(5,20)).'Tag'.generateName(rand(5,20)).' -->';

					} else {

						$htmlEntitlTagsRand = '';

					};

					$php_code_combined = str_replace('<'.$htmlTagl.' ',htmlentities(htmlentities(''.$htmlEntitlTagsRand.'<'.$htmlTagl.'')).' ',$php_code_combined); # Ex: <a ...
					$php_code_combined = str_replace('<'.$htmlTagl.'>',htmlentities(htmlentities(''.$htmlEntitlTagsRand.'<'.$htmlTagl.'>')),$php_code_combined); # Ex: <head>
					$php_code_combined = str_replace('</'.$htmlTagl.'>',htmlentities(htmlentities('</'.$htmlTagl.'>'.$htmlEntitlTagsRand.'')),$php_code_combined); # Ex: </a>
					
				};
			};

			# Searches For Echo And Replaces Content With Entity Decode
			preg_match_all("/echo ?[\'\"](.*?)[\'\"];/ms", $php_code_combined, $echMatchCase);
			foreach($echMatchCase[0] as $match){

//.. Check if match has " or ' Symbol and do correct Fix else defined php will not work.

				# Replaces echo With HTML Decode Else Does Not Fully Work Entities the Way I Expect Them.
				$MadeRandNameFordecode = generateName(15);
				$php_code_combined = str_replace($match,'$'.generateName(38).' = "<header><div>.<b>.</div></header>"; $'.$MadeRandNameFordecode.' = html_entity_decode(html_entity_decode(\''.$echMatchCase[1][$numech].'\')); $'.generateName(38).' = "<header><div>.<b>.</div></header>"; echo $'.$MadeRandNameFordecode.'; $'.generateName(38).' = "<header><div>.<b>.</div></header>";',$php_code_combined);
				$numech ++;

			}

			# Searches For print And Replaces Content With Entity Decode
			preg_match_all("/print ?[\'\"](.*?)[\'\"];/ms", $php_code_combined, $echMatchCase);
			foreach($echMatchCase[0] as $match){

//.. Check if match has " or ' Symbol and do correct Fix else defined php will not work.

				# Replaces echo With HTML Decode Else Does Not Fully Work Entities the Way I Expect Them.
				$MadeRandNameFordecode = generateName(25);
				$php_code_combined = str_replace($match,'$'.generateName(38).' = "<header><div>.<b>.</div></header>"; $'.$MadeRandNameFordecode.' = html_entity_decode(html_entity_decode(\''.$echMatchCase[1][$numechP].'\')); $'.generateName(38).' = "<header><div>.<b>.</div></header>"; print $'.$MadeRandNameFordecode.'; $'.generateName(38).' = "<header><div>.<b>.</div></header>";',$php_code_combined);
				$numechP ++;

			}

			# Lastly Removing New Lines
			if($_POST['use_space_tab_rem'] == true){
				$php_code_combined = str_replace("	",' ', $php_code_combined);
				$php_code_combined = str_replace("  ",' ', $php_code_combined);
			};
			$php_code_combined = str_replace("\r",' ', $php_code_combined);
			$php_code_combined = str_replace("\n",' ', $php_code_combined);
			$php_code_combined = $php_code_combined;
			
			# Adding Header On Top Of File With
			$php_result_code = '';

			if($_POST['header_top'] !== ""){

				$php_result_code .= '<?php'.PHP_EOL;
				$php_result_code .= '/*'.PHP_EOL;
				$php_result_code .= $_POST['header_top'].''.PHP_EOL;
				$php_result_code .= '*/'.PHP_EOL;
				$php_result_code .= '?>'.PHP_EOL;

			};
			
			# Decode Encode Code
			if($_POST['use_encode_w_eval'] == false){

				$php_result_code .= $php_code_combined;

			} else {

				if($_POST['use_encode_w_eval_type'] === '1'){

					$php_result_code .= '<?php eval(gzinflate(base64_decode(base64_decode(str_rot13("'.str_rot13(base64_encode(base64_encode(gzdeflate($php_code_combined)))).'"))))); ?>';

				} elseif($_POST['use_encode_w_eval_type'] === '2'){

					$php_result_code .= '<?php eval(gzinflate(base64_decode(strrev(str_rot13("'.str_rot13(strrev(base64_encode(gzdeflate($php_code_combined)))).'"))))); ?>';

				} elseif($_POST['use_encode_w_eval_type'] === '3'){

					$php_result_code .= '<?php eval(str_rot13(gzinflate(str_rot13(base64_decode("'.base64_encode(str_rot13(gzdeflate(str_rot13($php_code_combined)))).'"))))); ?>';

				} elseif($_POST['use_encode_w_eval_type'] === '4'){

					$php_result_code .= '<?php eval(gzinflate(base64_decode("'.base64_encode(gzdeflate($php_code_combined)).'"))); ?>';

				} else {

					$php_result_code .= $php_code_combined;

				};

			};
			
			# Save File TO Packed Folder With Original Name
			file_put_contents($obf_path_packed.''.$array_file,$php_result_code); chmod($obf_path_packed.''.$array_file, 0755);


			# Increase File ID
			$i ++;
		};

		# Get Single File Content Else Zip Url For Others
		if($is_OBF_Single == 1){

			echo $Succ_S.' Code Has Been Obfuscated'.$Succ_E;

			$Single_File_Content = file_get_contents($obf_path_packed.''.$array_file);

			echo'
				<label for="pwd"><h3 style="color:#38ad38;">Obfuscated Code Result</h3></label>
				<textarea id="resutOut" spellcheck="false">'.$Single_File_Content.'</textarea>
			';

			# Delete Single Files
			unlink($obf_path_packed.''.$array_file);

		} elseif($is_OBF_Zip == 1){

			echo $Succ_S.' Files Has Been Obfuscated & Zipped'.$Succ_E;

//.. Zip Folder And Provide Download Url

//.. Delete Folders & Files

		};

		# Error Code Processing To Nofity User Of Issue.
		if($error !== 0){

			End:

			if($error == 100){ echo $Err_S.' File Size Is To Big And Is Not Allowed To Upload'.$Err_E; }
			elseif($error == 102){ echo $Err_S.' Opened Zip Was Not Valid And Failed To Extract'.$Err_E; }
			elseif($error == 103){ echo $Err_S.' Both TextArea And Upload Are Empty'.$Err_E; }
			else { echo $Err_S.' Something went wrong, Check your files & try again!'.$Err_E; };

		};
		
		unset($varArrayGlb['var_saved']);
		unset($varArrayGlb['func_saved']);
		unset($setVarArrCase);
		unset($sesFuncArray);
		
	};

	# Footer Section Of Template
	echo'</div>
	</div>
</div>
<div>
	<div style="height:50px;"></div>
	<center>
		<div style="font-size:15px;">copyright (c) 2023 <b>php-obf.com</b>, All Rights Reserved</div>
		All visual aspects of this website has been coded by php-obf.com except for font-awesome icons.
	</center>
	<div style="height:50px;"></div>
</div>
<script>
	$(document).ready(function() {
		$( "input#file-upload" ).change(function() {
			var ele = document.getElementById($("input#file-upload").attr("id"));
			var result = ele.files;
			$( "#file_name_output" ).html(result[0].name);
		});
		if('.$scrollBottom.' == 1){
			$("html,body").animate({scrollTop: document.body.scrollHeight},"slow");
		};
	});
</script>
</body>
</html>
';
		
} catch (Exception $err) {
	echo $err->getMessage();
};

?>




















