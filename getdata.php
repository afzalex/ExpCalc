<?PHP
$properties = json_decode(file_get_contents('properties.json'));
$entriesDirectory = $properties->ENTRIES_DIRECTORY;
$months = array('jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 
    'oct', 'nov', 'dec');

$data = array(
    'timestamp'=> date('l jS \of F Y h:i:s A'),
    'months'=> array(),
    'dat'=> $properties->ENTRIES_DIRECTORY.'/*'
);

foreach(glob($properties->ENTRIES_DIRECTORY.'/*') as $dirloc) {
    if(is_dir($dirloc)){
        $dirname = basename($dirloc);
        $test = array();
        if(in_array($dirname, $months)){
            $candidates = array();
            $direntry = array(
                'dirloc'=> $dirloc,
                'dirname'=> $dirname
            );
            $monthsum = 0;
            foreach(glob($dirloc.'/*_expcalc.csv') as $fileloc){
                $basename = basename($fileloc);
                $handle = fopen($fileloc, 'r');
                if($handle) {
                    $candidate = array(
                        'fileloc'=> $fileloc,
                        'filename'=> $basename,
                        'name'=> substr(str_replace('_', ' ', $basename), 0,
                                strlen($basename) - 12),
                        'entries'=> array()
                    );
                    $sum = 0;
                    while(($line = fgets($handle)) !== false){
                        $line = trim($line);
                        if(strlen($line) > 0){
                            $entry = parseEntry($line);
                            array_push($candidate['entries'], $entry);
                            if($entry['isvalid']){
                                $sum += $entry['cost'];
                            }
                        }
                    }
                    $candidate['cost'] = $sum;
                    $monthsum += $sum;
                    array_push($candidates, $candidate);
                }
            }
            $direntry['total'] = $monthsum;
            $average = $monthsum / count($candidates);
            $direntry['average'] = $average;
            for($i = 0; $i < count($candidates); $i++){
                $candidates[$i]['balance'] = $candidates[$i]['cost'] - $average;
            }
            $direntry['candidates'] = $candidates;
            array_push($data['months'], $direntry);
        }
    }
}

header('Content-Type: application/json');
echo json_encode($data);


function parseEntry($entry){
    $len = strlen($entry);
    for($i = 0; $i < $len; $i++){
        if($entry[$i] == ','){
            $cost = intval(substr($entry, 0, $i));
            break;
        }
    }
    $l = $i + 1;
    for($i = $l; $i < $len; $i++){
        if($entry[$i] == ','){
            $date = intval(substr($entry, $l, $i));
            break;
        }
    }
    $desc = trim(substr($entry, $i + 1), '\" ');
    return array(
        'entry'=> $entry,
        'cost'=> $cost,
        'date'=> $date,
        'description'=> $desc, 
        'isvalid'=> true
    );
}