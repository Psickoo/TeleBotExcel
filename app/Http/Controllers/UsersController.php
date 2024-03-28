<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller; // Perhatikan perubahan di sini
use App\Models\Kota;
use Maatwebsite\Excel\Facades\Excel;
use Telegram\Bot\Api;
use TelegramBot\Api\BotApi;

class UsersController extends Controller
{
    public function index()
    {
        $kotas = Kota::select('id', 'nama', 'negara')->get();

        $data = [
            'kotas' => $kotas
        ];


        return view('welcome', $data);
    }

    public function exportData()
    {
        $data = Kota::select('id', 'nama', 'negara')->get();
    
        $export = new UsersExport($data);
        Excel::store($export, 'data.xlsx', 'temp');

            $document = new \CURLFile(storage_path('app/temp/data.xlsx'));

        $bot = new BotApi('YOUR_BOT_TOKEN');
        $bot->sendDocument('YOUR_GROUP_ID', $document);
    
        return response()->json(['message' => 'Data exported and sent successfully!']);
    }
}
