<?php
    require_once 'classes/session.php';
    class SessionController extends Controller{
        
        private $userSession;
        private $userID;
        
        private $session;
        private $sites;

        private $user;

        function __construct(){
            parent::__construct();
            $this->init();
        }

        function init(){
            $this->session = new Session();

            $json = $this->getJSONFileConfig();

            $this->sites = $json['sites'];
            $this->defaultSites = $json['default-sites'];

            $this->validateSession();

        }

        private function getJSONFileConfig(){
            $string = file_get_contents('config/access.json');
            $json = json_decode($string, true);

            return $json;
        }

        public function validateSession(){
            error_log('SessionController::validateSession -> Validando Sesion');
            
            if($this->existsSession()){
                
                if($this->isPublic()){
                    //si la pagina a entrar es publica
                    error_log('SessionController::validateSession -> Sesion encontrada, redirigiendo a dashboard');
                    $this->redirectDefaulSite();
                }else{
                    error_log('SessionController::validateSession -> Sesion encontrada, pagina privada... continua');
                    //si no es publica
                    
                }
            }else{
                //No existe la sesion
                error_log('SessionController::validateSession -> No se encontró una sesión');

                if($this->isPublic()){
                    //no pasa na
                }else{
                    //Vas pa fuera master
                    header('Location: ' . constant('URL') . '');
                }
            }
        }

        function existsSession(){
            if(!$this->session->exists()) return false;
            if($this->session->getCurrentUser() == null) return false;

            $userID = $this->session->getCurrentUser();

            if($userID) return true;

            return false;
            
        }

        function getUserSessionData(){
            $id = $this->userID;
            $this->user = new MedicModel();
            $this->user->get($id);
            error_log('SessionController::getUserSessionData' . $this->user->getNombre());
            return $this->user;
        }
        
        function isPublic(){
            $currentURL = $this->getCurrentPage();
            $currentURL = preg_replace( "/\?.*/", "", $currentURL); //omitir get info

            for($i = 0; $i < sizeof($this->sites); $i++){
                if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['access'] == 'public'){
                    error_log('SessionController::isPublic -> El recurso es publico');
                    return true;
                }
            }
            error_log('SessionController::isPublic -> El recurso es privado');
            return false;
        }
        
        function getCurrentPage(){
            $actualLink = trim($_SERVER['REQUEST_URI']);
            $url = explode('/', $actualLink);
            error_log('SessionContoller::getCurrentPage -> ' . $url[2]);
            return $url[2];
        }

        private function redirectDefaulSite(){
            error_log('SessionController::redirectDefaultSite');
            header('location:'. constant('URL').'/dashboard');
        }

        function initialize($user){
            error_log("SessionController::initialize(): user: " . $user->getID());
            $this->session->setCurrentUser($user->getID());
            $this->authorizeAcess('user');                      //si se llegaran a tener mas roles
        }

        function authorizeAcess(){
            $this->redirect($this->defaultSites['user'], []);
        }

        function logout(){
            $this->session->closeSession();
        }
    }

?>