<?php

namespace App\Controllers;

use App\Config;
use App\Model\UserRegister;
use App\Models\Articles;
use App\Utility\Cookie;
use App\Utility\Hash;
use App\Utility\Session;
use \Core\View;
use Exception;
use http\Env\Request;
use http\Exception\InvalidArgumentException;
use App\Utility\Regex;
use \Core\SendMail;

/**
 * User controller
 */
class User extends \Core\Controller
{

    /**
     * Affiche la page de login
     * 
     * Ajout de la gestion des code d'erreur, du cookie de session
     */
    // 
    public function loginAction()
    {
        if(isset($_POST['submit'])){
            $f = $_POST;

            // TODO: Validation

            $this->login($f);

            // Si login OK, redirige vers le compte
            header('Location: /account');
        }

        View::renderTemplate('User/login.html', [
            'emailValue' => $valueemail,
            'messageErreur' => $messageErreur
        ]);
    }

    /**
     * Page de création de compte
     * Ajout de la gestion des code d'erreur, de va vérificatino des identifiant avec code erreur,
     * et du login direct apres l'inscription 
     */
    public function registerAction()
    {
        if(isset($_POST['submit'])){
            $f = $_POST;

            if($f['password'] !== $f['password-check']){
                // TODO: Gestion d'erreur côté utilisateur
            }

            // validation

            $this->register($f);
            // TODO: Rappeler la fonction de login pour connecter l'utilisateur
        }

        View::renderTemplate('User/register.html');
    }

    /**
     * Affiche la page du compte
     * Ajout d'information sur le profil utilisateur
     */
    public function accountAction()
    {
        try {
            $articles = Articles::getByUser($_SESSION['user']['id']);
            $count = is_null(Articles::getcountByUser($_SESSION['user']['id'])) ? 0 : Articles::getcountByUser($_SESSION['user']['id']);
            $countview = is_null(Articles::getcountviewByUser($_SESSION['user']['id'])) ? 0 : Articles::getcountviewByUser($_SESSION['user']['id']);
            if (isset($_GET['arg']) && ($_GET['arg'] == 'pop' || ($_GET['arg'] == 'rec'))) {
                $arg = $_GET['arg'];
            } else {
                $arg = null;
            }
        } catch (\Exception $e) {

            echo "<script>console.log('Debug Objects: " . $e . "' );</script>";
        }

        View::renderTemplate('User/account.html', [
            'articles' => $articles,
            'nb_art' => $count,
            'nb_vue' => $countview,
            'arg' => $arg,

        ]);
    }

    /*
     * Fonction privée pour enregister un utilisateur
     * Ajout information dan stableau data pour login et appel de login
     */
    private function register($data)
    {
        try {
            // Generate a salt, which will be applied to the during the password
            // hashing process.
            $salt = Hash::generateSalt(32);
            $userID = \App\Models\User::createUser([
                "email" => $data['email'],
                "username" => $data['username'],
                "password" => Hash::generate($data['password'], $salt),
                "salt" => $salt
            ]);
            $data = [
                'email' => $data['email'],
                "password" => $data['password']
            ];
            return $userID;
        } catch (Exception $ex) {
            // TODO : Set flash if error : utiliser la fonction en dessous
            Utility\Flash::danger($ex->getMessage());
        }
        $this->login($data);
    }


    private function login($data){
        try {
            if(!isset($data['email'])){
                throw new Exception('TODO');
            }

                $user = \App\Models\User::getByLogin($data['email']);
                if (Hash::generate($data['password'], $user['salt']) == $user['password']) {
                    $_SESSION['user'] = array(
                        'id' => $user['id'],
                        'username' => $user['username']
                    );

                    //Si l'utilisateur souhaite sauvegarder sa session par cookie :
                    if (isset($data['checkbox']) && $data['checkbox'] == true) {
                        Cookie::setCookies($data['email'], $_SESSION["user"]["username"], $_SESSION["user"]["id"]);
                    }

                    return true;
                } else {
                    header('Location: /login?code=errlog&email=' . $data['email']);
                    return false;
                }
            } else {
                header('Location: /login?code=errlog&email=' . $data['email']);
                return false;
            }
            return true;
        } catch (Exception $ex) {
            header('Location: /login?code=errlog&email=' . $data['email']);
            die();
            // TODO : Set flash if error
            /* Utility\Flash::danger($ex->getMessage());*/
        }
    }
    /**
     * 
     * Logout: Delete cookie and session. Returns true if everything is okay,
     * otherwise turns false.
     * @access public
     * @return boolean
     * @since 1.0.2
     */
    public function logoutAction() {

        /*
        if (isset($_COOKIE[$cookie])){
            // TODO: Delete the users remember me cookie if one has been stored.
            // https://github.com/andrewdyer/php-mvc-register-login/blob/development/www/app/Model/UserLogin.php#L148
        }*/
        // Destroy all data registered to the session.

        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        header ("Location: /");

        return true;
    }

}
