<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home(){
        return view('home');
    }

    public function feature()
    {
        return view('feature');
    }

    public function download()
    {
        return view('download');
    }

    public function about()
    {
        return view('about');
    }

    public function faqs()
    {
        return view('faqs');
    }

    public function issue()
    {
        return view('issue');
    }

    public function whatsnew()
    {
        return view('whatsnew');
    }


    public function overview()
    {
        return view('doc/overview');
    }

    public function installation()
    {
        return view('doc/installation');
    }

    public function quickstart()
    {
        return view('doc/quickstart');
    }

    public function trim()
    {
        return view('doc/functionality/trim');
    }

    public function dedupbasic()
    {
        return view('doc/functionality/dedupbasic');
    }

    public function deduppos()
    {
        return view('doc/functionality/deduppos');
    }

    public function dedupgene()
    {
        return view('doc/functionality/dedupgene');
    }

    public function dedupsc()
    {
        return view('doc/functionality/dedupsc');
    }

    public function dechimeric()
    {
        return view('doc/functionality/dechimeric');
    }

    public function input()
    {
        return view('doc/fileformat/input');
    }

    public function output()
    {
        return view('doc/fileformat/output');
    }

    public function metdechimeric()
    {
        return view('doc/methodology/dechimeric');
    }

    public function metmcl()
    {
        return view('doc/methodology/mcl');
    }

    public function metdirectional()
    {
        return view('doc/methodology/directional');
    }



    public function changelog()
    {
        return view('doc/other/changelog');
    }
}
