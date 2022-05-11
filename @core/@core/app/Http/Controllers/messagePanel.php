<?php

namespace App\Http\Controllers;

use App\Admin;
use App\ImageGallery;
use App\ImageGalleryCategory;
use App\Jobs;
use App\JobsCategory;
use App\KnowAbout;
use App\Knowledgebase;
use App\KnowledgebaseTopic;
use App\Language;
use App\Mail\AdminResetEmail;
use App\Mail\CallBack;
use App\Mail\ContactMessage;
use App\Mail\PlaceOrder;
use App\Mail\RequestQuote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class messagePanel extends Controller
{

    public function show_panel()
    {

        
        return view('backend.chat_user.chatPanel');
        // return view('frontend.frontend-home')->with($return_data);
    }

    

}//end class
