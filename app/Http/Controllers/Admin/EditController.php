<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Controll;
use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class EditController extends Controller
{
    public function __construct()
    {
    }
   /**
    * 设置
    */
   public function edit()
   {
       return view('admin.edit');
   }
}
