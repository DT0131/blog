<?php

namespace App\Http\Controllers;

use App\Contacts;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        // バリデーションチェック
        $request->validate([
            'name' => ['required', 'max:255'],
            'kana' => ['max:255'],
            'email' => ['max:100'],
            'detail' => ['required', 'max:1000'],
        ]);

        // バリデーション成功時はデータの保存
        $contacts = new Contacts;
        $contacts->name = $request->name;
        if (!empty($request->kana)) {
            $contacts->kana = $request->kana;
        }
        if (!empty($request->email)) {
            $contacts->email = $request->email;
        }
        $contacts->detail = $request->detail;

        // DBにデータ保存
        $contacts->save();

        $saveSuccessMessage = "下記の問い合わせ内容を受け付けました。" . PHP_EOL . "ありがとうございました。";

        $contactContents[] = (!empty($request->name)) ? "お名前：" . $request->name : "";
        $contactContents[] = (!empty($request->kana)) ? "ふりがな：" . $request->kana : "";
        $contactContents[] = (!empty($request->email)) ? "メールアドレス：" . $request->email : "";
        $contactContents[] = (!empty($request->detail)) ? "ご意見・ご要望" . PHP_EOL . $request->detail : "";

        return view('contact_complete', compact('saveSuccessMessage', 'contactContents'));
    }
}
