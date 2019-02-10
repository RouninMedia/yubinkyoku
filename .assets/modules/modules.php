<?php

  //=================//
 // ERROR REPORTING //
//=================//

error_reporting(E_ALL);
ini_set('display_errors', 1);



  //===============//
 // BUILD HEADERS //
//===============//

ob_start ("ob_gzhandler");
header("Content-type: application/javascript; charset: UTF-8");
header("Cache-Control: must-revalidate");
$offset = (60 * 60);
$ExpStr = "Expires: ".gmdate("D, d M Y H:i:s", time() + $offset)." GMT";
header($ExpStr);



  //===============//
 // GET PAGE DATA //
//===============//

$Page = $_SERVER['HTTP_REFERER'];
$Page = str_replace('https://'.$_SERVER['HTTP_HOST'].'/.assets/design/scripts/', '', $Page);
$Page = str_replace('/scripts.js', '', $Page);

$Page_Data = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/.assets/content/pages/'.$Page.'/page.json'), true);


  //================//
 // IMPORT MODULES //
//================//

$Page_Modules = $Page_Data['Ashiva_Page_Build']['Ashiva_Page_Modules'];

if (count(array_filter($Page_Modules)) > 0) {

  for ($i = 0; $i < count($Page_Modules); $i++) {

    echo 'import {'.$Page_Modules[$i].'Module} from \'/.assets/modules/'.strtolower($Page_Modules[$i]).'/design/scripts/'.strtolower($Page_Modules[$i]).'.js\'; '."\n";
  }
}



  //==========================//
 // BUILD pageModules OBJECT //
//==========================//

// PHP VERSION
echo "\n".'const pageModules = {};'."\n";

if (count(array_filter($Page_Modules)) > 0) {

  for ($i = 0; $i < count($Page_Modules); $i++) {

    echo 'pageModules[\''.$Page_Modules[$i].'\'] = '.$Page_Modules[$i].'Module;'."\n";
  }
}

else {

	echo 'pageModules[\'NoModules\'] = \'NoModules\';'."\n";
}


// OPTIONAL STUFF //

/*
echo 'console.log(\'PHP Generated pageModules:\');'."\n";
echo 'console.log(pageModules);'."\n";


// JS VERSION
echo "\n".'const pageModules2 = {};'."\n";
echo 'const moduleList = JSON.parse(\''.json_encode($Page_Modules).'\');'."\n\n";

echo 'for (let i = 0; i < moduleList.length; i++) {'."\n";
echo '  pageModules2[moduleList[i]] = eval(moduleList[i].replace(/[^0-9a-z_-]/gi, \'\') + \'Module\');'."\n";
echo '}'."\n";

echo 'console.log(\'JS Generated pageModules2:\');'."\n";
echo 'console.log(pageModules2);'."\n";
*/



  //===========================//
 // EXPORT pageModules OBJECT //
//===========================//

echo "\n".'export {pageModules};'."\n";

?>
