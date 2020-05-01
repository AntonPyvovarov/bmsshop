<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{

    public function create()
    {
        return view('contact.contact');
    }
    public function store ()
    {
        $data= request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'massage'=>'required',
        ]);

        $massage ='Имя '.$data['name'].PHP_EOL
                   .'Email ' .$data['email'].PHP_EOL
                    .'Сообщение'.PHP_EOL
                    .$data['massage'];

        $telegram= new TelegramController();
        $telegram->telegram($massage);

        Mail::to('Antopyvo87@gmail.com')->send(new SendMail());
        return  redirect()->action('Shop\ProductController@index');
    }

}
