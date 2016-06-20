<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attendance;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AttendanceController extends Controller
{
    public function index()
    {

        return view('user.attendance');

    }

    public function show(Attendance $request)
    {
        //パラメータをセット
        $params = array(
            "__VIEWSTATE" =>
                '/wEPDwUKMTg0MjY2OTY5OA9kFgJmD2QWBAIBD2QWAgICDxYCHgRocmVmBRQuLi9DU1MvU1QwMTAwXzAxLmNzc2QCAw9kFgICAQ9kFgICAQ8PFgIeBFRleHRlZGRknLCT0wbtPTUzEEWyDkyXidPtiQk=',
            "__EVENTVALIDATION" =>
                '/wEWBQLUsqeUCgLJ7r3+DgL90KKTCAKO9e+RAQLFufqABGURK8jkSsDS5JYv4e/RwRH9P785',
            "__SCROLLPOSITIONY" => "0",
            "__SCROLLPOSITIONX" => "0",
            "ctl00\$ContentPlaceHolder1\$txtUserId" => $request->number,
            "ctl00\$ContentPlaceHolder1\$txtPassword" => $request->pass,
            "ctl00\$ContentPlaceHolder1\$btnLogin" => "ログイン"
        );

        //クッキー保存ファイルを作成
        //Cookieを同じ場所に保存しています。
        $fp = fopen(storage_path() . "/tmp", "w");
        $fpPath = storage_path() . "/tmp";
        $coolie = storage_path() . "/cookie";

        //ログインページへ移動
        $URL1 = "http://school4.ecc.ac.jp/EccStdWeb/ST0100/ST0100_01.aspx";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL1);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        //プロキシ設定(実行サーバー環境しだいで不要)
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
        curl_setopt($ch, CURLOPT_PROXY, 'http://proxy.ecc.ac.jp:8080');
        curl_setopt($ch, CURLOPT_PROXYPORT, '8080');
        //プロキシ設定　ここまで
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_WRITEHEADER, $fp);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $coolie);
        $put = curl_exec($ch) or die('error ' . curl_error($ch));
        curl_close($ch);

        //ログインIDとパスワードを転送して認証されれば出席照会ページへとぶ
        $URL2 = "http://school4.ecc.ac.jp/EccStdWeb/ST0500/ST0500_01.aspx";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL2);
        //プロキシ設定(実行サーバー環境しだいで不要)
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
        curl_setopt($ch, CURLOPT_PROXY, 'http://proxy.ecc.ac.jp:8080');
        curl_setopt($ch, CURLOPT_PROXYPORT, '8080');
        //プロキシ設定　ここまで
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $coolie);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $coolie);
        $output = curl_exec($ch);
        curl_close($ch);
        $html = mb_convert_encoding($output, 'HTML-ENTITIES', 'ASCII, JIS, UTF-8, EUC-JP, SJIS');

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_clear_errors();
        $xpath = new \DOMXpath($dom);

        $data = array();
        $count = 0;

        //テーブル検索
        $table_rows = $xpath->query('//table[@id="ctl00_ContentPlaceHolder1_gdvSyusekiList"]');
        foreach ($table_rows as $row => $tr) {
            foreach ($tr->childNodes as $td) {
                foreach ($td->childNodes as $value) {
                    $data[$count][] = trim($value->nodeValue);
                }
                $count++;
            }
        }

        fclose($fp);

        $this->deleteFile($fpPath);
        $this->deleteFile($coolie);

        return view("user.attendance-show", ["datas" => $data]);
    }

    private function deleteFile($filePath)
    {
        File::delete($filePath);
    }


}

