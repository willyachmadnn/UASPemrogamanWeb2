<?php
namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function auth()
    {
        $usersModel = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $usersModel->where('username', $username)->first();
        $userByPassword = $usersModel->where('password', $password)->first();
        if (!$user && !$userByPassword) {
            session()->setFlashdata('error', 'Username dan password salah');
            return redirect()->to('/');
        } elseif (!$user && $userByPassword) {
            session()->setFlashdata('error', 'Username salah');
            return redirect()->to('/');
        } elseif ($user && $user['password'] != $password) {
            session()->setFlashdata('error', 'Password salah');
            return redirect()->to('/');
        }
        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'logged_in' => true
        ]);
        return redirect()->to('/home');
    }

    public function logout_confirm()
    {
        return view('auth/logout');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}