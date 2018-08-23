<?php
/**
 * 
 */
class play  {
	public $argument=null;
	public $arr=null;
  public $resource;
  public $action;

	function __construct($argument=null) {
		
	}
  
	static function pr($arr){
		echo("<pre style='text-align:left'>");print_r($arr);echo("</pre>");
	}

static function uploadmedia_url($filename,$module,$file=null,$param_w='150',$param_h='120',$WaterMark=null){



    $newname='';
    if($file == null){

    //
      $newname='img_' .date('Ymdhis').rand();

    file_put_contents(Doo::conf()->SITE_PATH.'global/uploads/'.$module.'/'.$newname.'.jpg',file_get_contents($filename));
     // move_uploaded_file(file_get_contents($filename),Doo::conf()->SITE_PATH.'global/uploads/'.$module.'/'.$newname.'.png');
      list($source_w, $source_h) = GetImageSize(Doo::conf()->SITE_PATH.'global/uploads/'.$module.'/'.$newname.'.jpg');

      $phpThumb = new phpThumb();
      $phpThumb->resetObject();
      $phpThumb->setSourceFilename(Doo::conf()->SITE_PATH.'global/uploads/'.$module.'/'.$newname.'.png');

      $phpThumb->setParameter('bg','ffffff');
      $phpThumb->setParameter('w',$source_w);
      $phpThumb->setParameter('h',$source_h);
      $phpThumb->setParameter('f', 'jpg');
      $phpThumb->setParameter('config_output_format', 'jpeg');
      $phpThumb->setParameter('config_imagemagick_path', '/usr/local/bin/convert');

      $phpThumb->GenerateThumbnail();
      //$phpThumb->RenderToFile($logo);



      $phpThumb = new phpThumb();
      $phpThumb->resetObject();
      $phpThumb->setSourceFilename(Doo::conf()->SITE_PATH.'global/uploads/'.$module.'/'.$newname.'.jpg');
      if($param_w=='100%' && $param_h=='100%'){
    $param_w=$source_w;
    $param_h=$source_h;
    }
      $phpThumb->setParameter('bg','ffffff');
      $phpThumb->setParameter('w',$param_w);
      $phpThumb->setParameter('h',$param_h);
      $phpThumb->setParameter('f', 'jpg');
      $phpThumb->setParameter('config_output_format', 'jpeg');
      $phpThumb->setParameter('config_imagemagick_path', '/usr/local/bin/convert');

      $phpThumb->GenerateThumbnail();
      //$phpThumb->RenderToFile($logo);
      $x= $phpThumb->RenderToFile(Doo::conf()->SITE_PATH.'global/uploads/'.$module.'/'.$newname.'.jpg');
      if (isset($WaterMark)) {
          self::printlogo(Doo::conf()->SITE_PATH.'global/uploads/'.$module.'/'.$newname.'.jpg', 'jpg',$WaterMark);
        }

  }else{
    $fi=explode('.',$filename);
    $extension = end($fi);
   // if(in_array(strtolower($extension),array('doc','docx','pdf','mp4','mp3','flv'))){
    $newname='file_' .date('Ymdhis').rand().'.mp4';
    $uploaddir = Doo::conf()->SITE_PATH.'global/uploads/'.$module.'/';
    $uploadfile = $uploaddir . $newname;

   file_put_contents($uploadfile,file_get_contents($filename));

     // }
  }
    //return $newname.'.'.$extension;
    return $newname;
  }

    static function resizemedia($file,$newname,$param_w='150',$param_h='120'){

  $phpThumb = new phpThumb();
      $phpThumb->resetObject();
      $phpThumb->setSourceFilename($file);
      $phpThumb->setParameter('bg','ffffff');
      $phpThumb->setParameter('quality','60');
      $phpThumb->setParameter('w',$param_w);
      $phpThumb->setParameter('h',$param_h);
      $phpThumb->setParameter('f', 'jpeg');
      $phpThumb->setParameter('config_output_format', 'jpeg');
      $phpThumb->setParameter('config_imagemagick_path', '/usr/local/bin/convert');

      $phpThumb->GenerateThumbnail();
    $file=str_replace(basename($file),$newname.'_'.basename($file),$file);
      $phpThumb->RenderToFile($file);
    return $file;
  }
        
	static function getname($file){
		$file_arr=explode('.',$file);
		return $file_arr[0];
	}

  static function display_message(){
    if(isset($_SESSION['inner_message']['success'])){
      if(count($_SESSION['inner_message']['success'])>0){
        foreach ($_SESSION['inner_message']['success'] as $message) {
          echo "<div class='alert alert-success alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    ".$message."
                  </div>";
        }
      }
    }
    if(isset($_SESSION['inner_message']['error'])){
      if(count($_SESSION['inner_message']['error'])>0){
        foreach ($_SESSION['inner_message']['error'] as $message) {
          echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    ".$message."
                  </div>";
        }
      }
    }
    unset($_SESSION['inner_message']);


  }
    static function new_message(){
      $messages = Doo::db()->find('Contact',array('limit'=>10,'select'=>'id,email,subject,create_date','where'=>" readed='0'"));
      return $messages;
    }

    static function humanTiming($time)
    {
        $time = strtotime($time);
        $time = time() - $time; // to get the time since that moment
        $time = ($time<1)? 1 : $time;
        $tokens = array (
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($tokens as $unit => $text) {
            if ($time < $unit) continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
        }

    }
   static function prefrances($name){
    //$pref = Doo::db()->find('Prefrances',array('limit'=>1,'select'=>$name));
    $pref = Doo::db()->find('Prefrances',array('limit'=>1,'select'=>'v','where'=>" k='".$name."'"));
    return (isset($pref->v))?$pref->v:'';
  }
 

   static function mod(){
        $mod=explode('/',Doo::conf()->PROTECTED_FOLDER);
        if($mod[count($mod)-1]!=''){return $mod[count($mod)-1];}else{return $mod[count($mod)-2];}
        
        }
        
    static function cleanquotes(){
        
        if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes($k)] = $v;
                $process[] = &$process[$key][stripslashes($k)];
            } else {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}
        }

    static function countries(){
        return '
  <option value="">Select</option>
  <option value="Afghanistan">Afghanistan</option>
  <option value="Åland Islands">Åland Islands</option>
  <option value="Albania">Albania</option>
  <option value="Algeria">Algeria</option>
  <option value="American Samoa">American Samoa</option>
  <option value="Andorra">Andorra</option>
  <option value="Angola">Angola</option>
  <option value="Anguilla">Anguilla</option>
  <option value="Antarctica">Antarctica</option>
  <option value="Antigua and Barbuda">Antigua and Barbuda</option>
  <option value="Argentina">Argentina</option>
  <option value="Armenia">Armenia</option>
  <option value="Aruba">Aruba</option>
  <option value="Australia">Australia</option>
  <option value="Austria">Austria</option>
  <option value="Azerbaijan">Azerbaijan</option>
  <option value="Bahamas">Bahamas</option>
  <option value="Bahrain">Bahrain</option>
  <option value="Bangladesh">Bangladesh</option>
  <option value="Barbados">Barbados</option>
  <option value="Belarus">Belarus</option>
  <option value="Belgium">Belgium</option>
  <option value="Belize">Belize</option>
  <option value="Benin">Benin</option>
  <option value="Bermuda">Bermuda</option>
  <option value="Bhutan">Bhutan</option>
  <option value="Bolivia">Bolivia</option>
  <option value="Bonaire">Bonaire</option>
  <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
  <option value="Botswana">Botswana</option>
  <option value="Bouvet Island">Bouvet Island</option>
  <option value="Brazil">Brazil</option>
  <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
  <option value="Brunei">Brunei</option>
  <option value="Bulgaria">Bulgaria</option>
  <option value="Burkina Faso">Burkina Faso</option>
  <option value="Burundi">Burundi</option>
  <option value="Cambodia">Cambodia</option>
  <option value="Cameroon">Cameroon</option>
  <option value="Canada">Canada</option>
  <option value="Cape Verde">Cape Verde</option>
  <option value="Cayman Islands">Cayman Islands</option>
  <option value="Central African Republic">Central African Republic</option>
  <option value="Chad">Chad</option>
  <option value="Chile">Chile</option>
  <option value="China">China</option>
  <option value="Christmas Island">Christmas Island</option>
  <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
  <option value="Colombia">Colombia</option>
  <option value="Comoros">Comoros</option>
  <option value="Congo">Congo</option>
  <option value="Congo (DRC)">Congo (DRC)</option>
  <option value="Cook Islands">Cook Islands</option>
  <option value="Costa Rica">Costa Rica</option>
  <option value="Croatia">Croatia</option>
  <option value="Cuba">Cuba</option>
  <option value="Curaçao">Curaçao</option>
  <option value="Cyprus">Cyprus</option>
  <option value="Czech Republic">Czech Republic</option>
  <option value="Denmark">Denmark</option>
  <option value="Djibouti">Djibouti</option>
  <option value="Dominica">Dominica</option>
  <option value="Dominican Republic">Dominican Republic</option>
  <option value="Ecuador">Ecuador</option>
  <option value="Egypt">Egypt</option>
  <option value="El Salvador">El Salvador</option>
  <option value="Equatorial Guinea">Equatorial Guinea</option>
  <option value="Eritrea">Eritrea</option>
  <option value="Estonia">Estonia</option>
  <option value="Ethiopia">Ethiopia</option>
  <option value="Falkland Islands (Islas Malvinas)">Falkland Islands (Islas Malvinas)</option>
  <option value="Faroe Islands">Faroe Islands</option>
  <option value="Fiji Islands">Fiji Islands</option>
  <option value="Finland">Finland</option>
  <option value="France">France</option>
  <option value="French Guiana">French Guiana</option>
  <option value="French Polynesia">French Polynesia</option>
  <option value="French Southern and Antarctic Lands">French Southern and Antarctic Lands</option>
  <option value="Gabon">Gabon</option>
  <option value="Gambia, The">Gambia, The</option>
  <option value="Georgia">Georgia</option>
  <option value="Germany">Germany</option>
  <option value="Ghana">Ghana</option>
  <option value="Gibraltar">Gibraltar</option>
  <option value="Greece">Greece</option>
  <option value="Greenland">Greenland</option>
  <option value="Grenada">Grenada</option>
  <option value="Guadeloupe">Guadeloupe</option>
  <option value="Guam">Guam</option>
  <option value="Guatemala">Guatemala</option>
  <option value="Guernsey">Guernsey</option>
  <option value="Guinea">Guinea</option>
  <option value="Guinea-Bissau">Guinea-Bissau</option>
  <option value="Guyana">Guyana</option>
  <option value="Haiti">Haiti</option>
  <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
  <option value="Honduras">Honduras</option>
  <option value="Hong Kong SAR">Hong Kong SAR</option>
  <option value="Hungary">Hungary</option>
  <option value="Iceland">Iceland</option>
  <option value="India">India</option>
  <option value="Indonesia">Indonesia</option>
  <option value="Iran">Iran</option>
  <option value="Iraq">Iraq</option>
  <option value="Ireland">Ireland</option>
  <option value="Isle of Man">Isle of Man</option>
  <option value="Israel">Israel</option>
  <option value="Italy">Italy</option>
  <option value="Jamaica">Jamaica</option>
  <option value="Jan Mayen">Jan Mayen</option>
  <option value="Japan">Japan</option>
  <option value="Jersey">Jersey</option>
  <option value="Jordan">Jordan</option>
  <option value="Kazakhstan">Kazakhstan</option>
  <option value="Kenya">Kenya</option>
  <option value="Kiribati">Kiribati</option>
  <option value="Korea">Korea</option>
  <option value="Kuwait">Kuwait</option>
  <option value="Kyrgyzstan">Kyrgyzstan</option>
  <option value="Laos">Laos</option>
  <option value="Latvia">Latvia</option>
  <option value="Lebanon">Lebanon</option>
  <option value="Lesotho">Lesotho</option>
  <option value="Liberia">Liberia</option>
  <option value="Libya">Libya</option>
  <option value="Liechtenstein">Liechtenstein</option>
  <option value="Lithuania">Lithuania</option>
  <option value="Luxembourg">Luxembourg</option>
  <option value="Macao SAR">Macao SAR</option>
  <option value="Macedonia, Former Yugoslav Republic of">Macedonia, Former Yugoslav Republic of</option>
  <option value="Madagascar">Madagascar</option>
  <option value="Malawi">Malawi</option>
  <option value="Malaysia">Malaysia</option>
  <option value="Maldives">Maldives</option>
  <option value="Mali">Mali</option>
  <option value="Malta">Malta</option>
  <option value="Marshall Islands">Marshall Islands</option>
  <option value="Martinique">Martinique</option>
  <option value="Mauritania">Mauritania</option>
  <option value="Mauritius">Mauritius</option>
  <option value="Mayotte">Mayotte</option>
  <option value="Mexico">Mexico</option>
  <option value="Micronesia">Micronesia</option>
  <option value="Moldova">Moldova</option>
  <option value="Monaco">Monaco</option>
  <option value="Mongolia">Mongolia</option>
  <option value="Montenegro">Montenegro</option>
  <option value="Montserrat">Montserrat</option>
  <option value="Morocco">Morocco</option>
  <option value="Mozambique">Mozambique</option>
  <option value="Myanmar">Myanmar</option>
  <option value="Namibia">Namibia</option>
  <option value="Nauru">Nauru</option>
  <option value="Nepal">Nepal</option>
  <option value="Netherlands">Netherlands</option>
  <option value="New Caledonia">New Caledonia</option>
  <option value="New Zealand">New Zealand</option>
  <option value="Nicaragua">Nicaragua</option>
  <option value="Niger">Niger</option>
  <option value="Nigeria">Nigeria</option>
  <option value="Niue">Niue</option>
  <option value="Norfolk Island">Norfolk Island</option>
  <option value="North Korea">North Korea</option>
  <option value="Northern Mariana Islands">Northern Mariana Islands</option>
  <option value="Norway">Norway</option>
  <option value="Oman">Oman</option>
  <option value="Pakistan">Pakistan</option>
  <option value="Palau">Palau</option>
  <option value="Palestinian Authority">Palestinian Authority</option>
  <option value="Panama">Panama</option>
  <option value="Papua New Guinea">Papua New Guinea</option>
  <option value="Paraguay">Paraguay</option>
  <option value="Peru">Peru</option>
  <option value="Philippines">Philippines</option>
  <option value="Pitcairn Islands">Pitcairn Islands</option>
  <option value="Poland">Poland</option>
  <option value="Portugal">Portugal</option>
  <option value="Puerto Rico">Puerto Rico</option>
  <option value="Qatar">Qatar</option>
  <option value="Republic of Côte dIvoire">Republic of Côte dIvoire</option>
  <option value="Reunion">Reunion</option>
  <option value="Romania">Romania</option>
  <option value="Russia">Russia</option>
  <option value="Rwanda">Rwanda</option>
  <option value="Saba">Saba</option>
  <option value="Samoa">Samoa</option>
  <option value="San Marino">San Marino</option>
  <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
  <option value="Saudi Arabia">Saudi Arabia</option>
  <option value="Senegal">Senegal</option>
  <option value="Serbia">Serbia</option>
  <option value="Seychelles">Seychelles</option>
  <option value="Sierra Leone">Sierra Leone</option>
  <option value="Singapore">Singapore</option>
  <option value="Sint Eustatius">Sint Eustatius</option>
  <option value="Sint Maarten">Sint Maarten</option>
  <option value="Slovakia">Slovakia</option>
  <option value="Slovenia">Slovenia</option>
  <option value="Solomon Islands">Solomon Islands</option>
  <option value="Somalia">Somalia</option>
  <option value="South Africa">South Africa</option>
  <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
  <option value="Spain">Spain</option>
  <option value="Sri Lanka">Sri Lanka</option>
  <option value="St. Barthélemy">St. Barthélemy</option>
  <option value="St. Helena">St. Helena</option>
  <option value="St. Kitts and Nevis">St. Kitts and Nevis</option>
  <option value="St. Lucia">St. Lucia</option>
  <option value="St. Martin">St. Martin</option>
  <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
  <option value="St. Vincent and the Grenadines">St. Vincent and the Grenadines</option>
  <option value="Sudan">Sudan</option>
  <option value="Suriname">Suriname</option>
  <option value="Swaziland">Swaziland</option>
  <option value="Sweden">Sweden</option>
  <option value="Switzerland">Switzerland</option>
  <option value="Syria">Syria</option>
  <option value="Taiwan">Taiwan</option>
  <option value="Tajikistan">Tajikistan</option>
  <option value="Tanzania">Tanzania</option>
  <option value="Thailand">Thailand</option>
  <option value="Timor-Leste">Timor-Leste</option>
  <option value="Togo">Togo</option>
  <option value="Tokelau">Tokelau</option>
  <option value="Tonga">Tonga</option>
  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
  <option value="Tunisia">Tunisia</option>
  <option value="Turkey">Turkey</option>
  <option value="Turkmenistan">Turkmenistan</option>
  <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
  <option value="Tuvalu">Tuvalu</option>
  <option value="Uganda">Uganda</option>
  <option value="Ukraine">Ukraine</option>
  <option value="United Arab Emirates">United Arab Emirates</option>
  <option value="United Kingdom">United Kingdom</option>
  <option value="United States">United States</option>
  <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
  <option value="Uruguay">Uruguay</option>
  <option value="Uzbekistan">Uzbekistan</option>
  <option value="Vanuatu">Vanuatu</option>
  <option value="Vatican City">Vatican City</option>
  <option value="Venezuela">Venezuela</option>
  <option value="Vietnam">Vietnam</option>
  <option value="Virgin Islands, British">Virgin Islands, British</option>
  <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
  <option value="Wallis and Futuna">Wallis and Futuna</option>
  <option value="Yemen">Yemen</option>
  <option value="Zambia">Zambia</option>
  <option value="Zimbabwe">Zimbabwe</option>

        ';
        }


public static function convert_number_to_words($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . play::convert_number_to_words(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . play::convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = play::convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= play::convert_number_to_words($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return $string;
}
        
}


?>