<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Generator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



class QRCodeController extends Controller
{

    public function __construct()
    {
        if (class_exists(\Imagick::class)) {
            // Force-disable Imagick so SimpleQrCode doesn't use it
            runkit_class_remove(\Imagick::class);
        }
    }

    // Worked
    public function generateGoogleQr()
    {
        $svg = QrCode::format('svg')->size(400)->generate('https://www.google.com');

        return response($svg)->header('Content-Type', 'image/svg+xml');
    }

    public function generateGoogleQrAndSave()
    {
        $url = 'https://www.rentmyfashion.com';

        // Generate SVG QR code
        $svg = QrCode::format('svg')->size(400)->generate($url);

        // Path to save the SVG
        $path = storage_path('app/public/qrcodes/');
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $fileName = 'rmf.svg';

        // Save the SVG content to a file
        file_put_contents($path . $fileName, $svg);

        // Optionally, return it to client
        return response()->download($path . $fileName);
    }



    public function generateGoogleQrOld()
    {
        $url = 'https://www.google.com';

        // Path where the file will be saved
        $path = storage_path('app/public/qrcodes/');
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $fileName = 'google_qr.png';

        // Create the PNG file
        QrCode::format('png')
            ->size(400)
            ->generate($url, $path . $fileName);

        // Return the file to the client
        return response()->download($path . $fileName);
    }
}
