<?PHP
$properties = json_decode(file_get_contents("properties.json"));
$entriesDirectory = $properties->ENTRIES_DIRECTORY;
$months = array("jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", 
    "oct", "nov", "dec");
$data = array(
    "timestamp"=> date("l jS \of F Y h:i:s A"),
    "months"=> array()
);
foreach(glob($properties->ENTRIES_DIRECTORY."/*") as $dirloc) {
    if(is_dir($dirloc)){
        $dirname = basename($dirloc);
        $test = array();
        if(in_array($dirname, $months)){
            $candidates = array();
            $direntry = array(
                "dirloc"=> $dirloc,
                "dirname"=> $dirname,
            );
            foreach(glob($dirloc.'/*_expcalc.csv') as $fileloc){
                $basename = basename($fileloc);
                $candidate = array(
                    "fileloc"=> $fileloc,
                    "filename"=> $basename,
                    "name"=> substr(str_replace('_', ' ', $basename), 0,
                            strlen($basename) - 12)
                );
                $handle = fopen($fileloc, 'r');
                if($handle) {
                    $candidate["isvalid"] = true;
                    $candidate["entries"] = array();
                    while(($line = fgets($handle)) !== false){
                        $line = trim($line);
                        if(strlen($line) > 0){
                            array_push($candidate["entries"], array(
                                "entry"=> $line
                            ));
                        }
                    }
                } else {
                    $candidate["isvalid"] = false;
                }
                array_push($candidates, $candidate);
            }
            $direntry["candidates"] = $candidates;
            array_push($data["months"], $direntry);
        }
    }
}

//foreach(glob($properties->ENTRIES_DIRECTORY.'/*_expcalc.csv') as $file) {
//    preg_match('/\w*(?=_expcalc\.csv$)/', $file, $matches);
//    $entry = array(
//        "filename"=> $file,
//        "name"=> str_replace('_', ' ', $matches[0])
//    );
//    $handle = fopen($file, "r");
//    if ($handle) {
//        $entry["isvalid"]=true;
//        $entry["entries"]=array();
//        while (($line = fgets($handle)) !== false) {
//            $line = trim($line);
//            if(strlen($line) > 0){
//                array_push($entry["entries"], array(
//                    "entry"=> $line
//                ));
//            }
//        }
//        fclose($handle);
//    } else {
//        $entry["isvalid"]=false;
//    } 
//    array_push($data["candidates"], $entry); 
//}

header('Content-Type: application/json');
echo json_encode($data);
