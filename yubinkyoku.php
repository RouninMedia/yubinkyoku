echo '
<script type="module">
';

$Page_Modules = array('searchForm', 'logo');

for ($i = 0; $i < count($Page_Modules); $i++) {

  echo 'import {'.$Page_Modules[$i].'Module} from \'/.assets/modules/'.url($Page_Modules[$i]).'/design/scripts/'.url($Page_Modules[$i]).'.js\'; '."\n";
}

echo "\n";

echo 'const pageModules = {};'."\n";

for ($i = 0; $i < count($Page_Modules); $i++) {

  echo 'pageModules[\''.$Page_Modules[$i].'\'] = '.$Page_Modules[$i].'Module;'."\n";
}

echo "\n";

echo 'initialiseModules(pageModules);'."\n";

echo '</script>
';
