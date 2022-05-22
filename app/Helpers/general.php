<?php

define('key_weather', '91e78261248d939305bb93de71dc1841');


function getFolder()
{

    return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
}


function uploadImage($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    return $filename;
}

function notifcation()
{
    $SERVER_API_KEY = 'AAAAne4XHa8:APA91bHhXRcfxMhTIKzA_6bZIly1L-VIOO1FMD8YFKGMKOxvuMbumPm2RddbSyXhF6puCukDr7LH8QOfjRcGz8GiiFaGduYBlMMmNJe9-wcQ5VCbpeen4CtIGMqzO2uKMJ9ElOy2yUMt';

    $token_1 = 'fRopUFspTU2X5RDwyx7aEv:APA91bGvzpDUt506qo3sH3G9Am1Vj8VJydmODtPLCyzV2kS7WlqSRRlmylhVPzkpG0sj2siewywIONuxQgY4aV8cMNPuRebclyCBCjKM0JADcj1p5fVLL99HFEmpLmylQz4wc-xFhRi4';

    $data = [

        "registration_ids" => [
            $token_1
        ],

        "notification" => [

            "title" => 'Welcome',

            "body" => 'Description',

            "sound" => "default" // required for sound on ios

        ],

    ];

    $dataString = json_encode($data);

    $headers = [

        'Authorization: key=' . $SERVER_API_KEY,

        'Content-Type: application/json',

    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

    $response = curl_exec($ch);

    dd($response);
}


