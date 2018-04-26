
<?php
function print_r_reverse($in) {
    $lines = explode("\n", trim($in));
    if (trim($lines[0]) != 'Array') {
        // bottomed out to something that isn't an array
        return $in;
    } else {
        // this is an array, lets parse it
        if (preg_match("/(\s{5,})\(/", $lines[1], $match)) {
            // this is a tested array/recursive call to this function
            // take a set of spaces off the beginning
            $spaces = $match[1];
            $spaces_length = strlen($spaces);
            $lines_total = count($lines);
            for ($i = 0; $i < $lines_total; $i++) {
                if (substr($lines[$i], 0, $spaces_length) == $spaces) {
                    $lines[$i] = substr($lines[$i], $spaces_length);
                }
            }
        }
        array_shift($lines); // Array
        array_shift($lines); // (
        array_pop($lines); // )
        $in = implode("\n", $lines);
        // make sure we only match stuff with 4 preceding spaces (stuff for this array and not a nested one)
        preg_match_all("/^\s{4}\[(.+?)\] \=\> /m", $in, $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
        $pos = array();
        $previous_key = '';
        $in_length = strlen($in);
        // store the following in $pos:
        // array with key = key of the parsed array's item
        // value = array(start position in $in, $end position in $in)
        foreach ($matches as $match) {
            $key = $match[1][0];
            $start = $match[0][1] + strlen($match[0][0]);
            $pos[$key] = array($start, $in_length);
            if ($previous_key != '') $pos[$previous_key][1] = $match[0][1] - 1;
            $previous_key = $key;
        }
        $ret = array();
        foreach ($pos as $key => $where) {
            // recursively see if the parsed out value is an array too
            $ret[$key] = print_r_reverse(substr($in, $where[0], $where[1] - $where[0]));
        }
        return $ret;
    }
}
$stringVar='[0] => CN=Tor Harold Martinsen,OU=External users,OU=Users,OU=KRS,OU=ECCOE,DC=elkem,DC=com
[1] => CN=Kirby Jewitt,OU=External users,OU=Users,OU=OSL,OU=ECCOE,DC=elkem,DC=com
[2] => CN=Trond Atle Grøthe,OU=External users,OU=Users,OU=OSL,OU=ECCOE,DC=elkem,DC=com
[3] => CN=K Raghu,OU=External users,OU=Users,OU=OSL,OU=ECCOE,DC=elkem,DC=com
[4] => CN=Thormod Berger,OU=External users,OU=Users,OU=OSL,OU=ECCOE,DC=elkem,DC=com
[5] => CN=Tommy Vetaas,OU=Users,OU=RAN,OU=ECCOE,DC=elkem,DC=com
[6] => CN=Pål Hellesnes,OU=External users,OU=Users,OU=OSL,OU=ECCOE,DC=elkem,DC=com
[7] => CN=Torbjørn Skjeggestad,OU=External users,OU=Users,OU=SAL,OU=ECCOE,DC=elkem,DC=com
[8] => CN=Roar Waagen,OU=External users,OU=Users,OU=OSL,OU=ECCOE,DC=elkem,DC=com
[9] => CN=Erik Kyllingstad,OU=External users,OU=Users,OU=OSL,OU=ECCOE,DC=elkem,DC=com
[10] => CN=Adrian Juell,OU=External users,OU=Users,OU=OSL,OU=ECCOE,DC=elkem,DC=com
[11] => CN=Petter Skjolden,OU=Users Disabled,DC=elkem,DC=com
[12] => CN=Fred Anda,OU=External users,OU=Users,OU=OSL,OU=ECCOE,DC=elkem,DC=com
[13] => CN=Øystein Guldberg,OU=External users,OU=Users,OU=SAL,OU=ECCOE,DC=elkem,DC=com
[14] => CN=Arild Skirstad,OU=External users,OU=Users,OU=THA,OU=ECCOE,DC=elkem,DC=com
[15] => CN=Tim Bardenhagen,OU=External users,OU=Users,OU=BRE,OU=ECCOE,DC=elkem,DC=com
[16] => CN=Luo Kun,OU=External users,OU=Users,OU=ECC,OU=ECCOE,DC=elkem,DC=com
[17] => CN=Damian Wilke,OU=External users,OU=Users,OU=KRS,OU=ECCOE,DC=elkem,DC=com
[18] => CN=Øystein Tranholt,OU=External users,OU=Users,OU=BJO,OU=ECCOE,DC=elkem,DC=com
[19] => CN=Árni Hermann Björgvinsson,OU=External users,OU=Users,OU=ICA,OU=ECCOE,DC=elkem,DC=com
[20] => CN=Hildur Sævarsdóttir,OU=External users,OU=Users,OU=ICA,OU=ECCOE,DC=elkem,DC=com
[21] => CN=Þóroddur Björgvinsson,OU=External users,OU=Users,OU=ICA,OU=ECCOE,DC=elkem,DC=com
[22] => CN=Oddur Carl Thorarensen,OU=External users,OU=Users,OU=ICA,OU=ECCOE,DC=elkem,DC=com
[23] => CN=Patrik Johansson,OU=Elvenite,OU=External users,OU=Users,OU=OSL,OU=ECCOE,DC=elkem,DC=com
[24] => CN=Hans Bengtsson,OU=Elvenite,OU=External users,OU=Users,OU=OSL,OU=ECCOE,DC=elkem,DC=com
[25] => CN=Jon Asheim,OU=External users,OU=Users,OU=KRS,OU=ECCOE,DC=elkem,DC=com
[26] => CN=Gunter Remøy,OU=External users,OU=Users,OU=KRS,OU=ECCOE,DC=elkem,DC=com
[27] => CN=Jan Terje Tjønn,OU=External users,OU=Users,OU=OSL,OU=ECCOE,DC=elkem,DC=com
[28] => CN=Kjetil Larsen,OU=External users,OU=Users,OU=BRE,OU=ECCOE,DC=elkem,DC=com
[29] => CN=Jonny Dragseth,OU=Users,OU=THA,OU=ECCOE,DC=elkem,DC=com
[30] => CN=Mathias Grahn,OU=External users,OU=Users,OU=OSL,OU=ECCOE,DC=elkem,DC=com
[31] => CN=Cecilia Rongedal,OU=External users,OU=Users,OU=OSL,OU=ECCOE,DC=elkem,DC=com
[32] => CN=Magnus Svendsen,OU=External users,OU=Users,OU=KRS,OU=ECCOE,DC=elkem,DC=com
[33] => CN=Christian Sævig,OU=External users,OU=Users,OU=KRS,OU=ECCOE,DC=elkem,DC=com
[34] => CN=Cecilia Hedensio,OU=Users Disabled,DC=elkem,DC=com';
$arrayVar=print_r_reverse($stringVar);
var_dump($arrayVar);
$arrayVar2 = array('1','2','3');
var_dump($arrayVar2);
?>
