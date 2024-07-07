<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Backend extends Controller
{

    public function dashboard()
    {
        return view('common/header') . view('backend/dashboard') . view('common/footer');
    }
}