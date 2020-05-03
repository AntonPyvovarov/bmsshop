<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{

    public function create()
    {
        return view('contact.contact');
    }

    public function store()
    {
        if (request()->input()) {
            $data = request()->validate([
                'name' => 'required',
                'tel' =>'numeric|required',
                'email' => 'required|email',
                'massage' => 'required',
            ]);

            $massage = 'Имя ' . $data['name'] . PHP_EOL
                . 'Телефон'.$data['tel'] . PHP_EOL
                . 'Email ' . $data['email'] . PHP_EOL
                . 'Сообщение' . PHP_EOL
                . $data['massage'];
            //save in database
            $contact = new Contact($data);
            $contact->save();

            //send massage in telegram
            $telegram = new TelegramController();
            $telegram->telegram($massage);
            //send massage to mail address
          //  Mail::to($data['email'])->send(new SendMail());
            return redirect()->action('Shop\ProductController@index');
        }
        return back()
            ->withErrors(['msg' => 'error!'])
            ->withInput();
    }


}
