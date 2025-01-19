<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $useremail = $this->request->getPost('useremail');
        $password = $this->request->getPost('password');
        
        $user = $userModel->where('userEmail', $useremail)->first();

        if ($user && password_verify($password, $user['userPwd'])) {
            $session->set([
                'isLoggedIn' => true,
                'userID' => $user['userID'],
                'userRoles' => $user['userRoles'],
            ]);
            
            // Redirect based on userRoles
            if ($user['userRoles'] == 1) {
                return redirect()->to('admin');
            } else {
                return redirect()->to(''); //refer to Routes.php, calls to $routes->get('/', 'Home::index');
            }
        }

        $session->setFlashdata('error', 'Invalid username or password');
        return redirect()->to('login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
