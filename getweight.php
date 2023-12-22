
    //Query ambil data di table settings
    $query = DB::table('settings')->get();

    // Maksimum weight
    $maxweight = $query[18]->value;

    // Com Port WB1
    $comwb1 = $query[0]->value;

    // Baudrate
    $baudratewb1 = $query[8]->value;

    $port = $comwb1;
    $baudrate = $baudratewb1;
    $perl_result = `perl serial.pl $port $baudrate`;

    $out1 = preg_replace('/[^\p{L}\p{N}\s]/u', '', $perl_result); //99 19470 kg

    // preg_match_all('!\d+!', $out1, $Test);
    $Text = (int) filter_var($out1, FILTER_SANITIZE_NUMBER_INT);

    // Validasi ID 99
    $Validasi = substr($Text, 0, 2);

    if($Validasi == 99){
    $Weight = substr($Text, 2);
    if($Weight > $maxweight){
    $Weight = 'MAXIMUM WEIGHT-';
    return $Weight;
    }
    return $Weight;
    }
    else{
    $Weight = 'ERROR GET WEIGHT';
    return $Weight;
    }
