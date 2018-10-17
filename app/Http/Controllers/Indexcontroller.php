<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\popularity;
use DB;

class Indexcontroller extends Controller
{
    public function index()
    {
        $tmp=popularity::all();
       // dump ($tmp);
    }

    public function add()
    {
        if ($skill=DB::select('select count from popularities where ip=?',[$_SERVER['REMOTE_ADDR']]))
        {
            $count=popularity::select(['count'])->where('ip',[$_SERVER['REMOTE_ADDR']])->first(); // получение кол-ва посещений
            $clientor= new popularity();
            $clientor::where('ip',[$_SERVER['REMOTE_ADDR']])->update(['count'=>$count['count']+1]); // добавление посещения
            //другой способ
            // $client=DB::update('update clients set count=? where ip=?',[$count['count']+1,$_SERVER['REMOTE_ADDR']]);
        }
        else
            {
                $client=popularity::create(['ip'=>$_SERVER['REMOTE_ADDR'],'count'=>'1']); //добавление ip в базу данных

                //второй способ добавить запись в базу данных
                //$clientor= new Client();
                //$clientor->fill(['ip'=>$_SERVER['REMOTE_ADDR'],'count'=>'1']);;
                //$clientor->save();
            }

        return redirect('task_1_1');
    }

    public function show()
    {
        $tmp=popularity::all();
        dump ($tmp);
    }
}

