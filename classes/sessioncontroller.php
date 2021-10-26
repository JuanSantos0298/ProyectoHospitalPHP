<?php
    require_once 'classes/session.php';
    require_once 'models/medicModel.php';
    
    class SessionController extends Controller{
        
        private $userSession;
        private $userID;
        private $userName;
        private $session;
        private $sites;

        private $user;

        function __construct(){
            parent::__construct();
            $this->init();
        }

        public function getUserSession(){
            return $this->userSession;
        }
    
        public function getUsername(){
            return $this->userName;
        }
    
        public function getUserId(){
            return $this->userID;
        }

        function init(){
            //se crea nueva sesión
            $this->session = new Session();
            //se carga el archivo json con la configuración de acceso
            $json = $this->getJSONFileConfig();
            // se asignan los sitios
            $this->sites = $json['sites'];
            // se asignan los sitios por default, los que cualquier rol tiene acceso
            $this->defaultSites = $json['default-sites'];
            // inicia el flujo de validación para determinar
            // el tipo de rol y permismos
            $this->validateSession();
        }

        private function getJSONFileConfig(){
            $string = file_get_contents('config/access.json');
            $json = json_decode($string, true);

            return $json;
        }

        public function validateSession(){
            error_log('SessionController::validateSession()');
            //Si existe la sesión
            if($this->existsSession()){
                $this->getUserSessionData();
                error_log("sessionController::validateSession(): ID Medico:" . $this->user->getID());
                if($this->isPublic()){
                    $this->redirectDefaultSite();
                    error_log( "SessionController::validateSession() => sitio público, redirige al dashboard" );
                }else{
                    //Autorizado, continua
                }
            }else{
                //No existe ninguna sesión
                //se valida si el acceso es público o no
                if($this->isPublic()){
                    error_log('SessionController::validateSession() pagina publica');
                    //la pagina es publica
                    //no pasa nada
                }else{
                    //la página no es pública
                    //redirect al login
                    error_log('SessionController::validateSession() redirigiendo al login');
                    header('location: '. constant('URL') . '');
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
            $id = $this->session->getCurrentUser();
            $this->user = new MedicModel();
            $this->user->get($id);
            error_log('SessionController::getUserSessionData' . $this->user->getNombre());
            return $this->user;
        }
        
        function isPublic(){
            $currentURL = $this->getCurrentPage();
            $currentURL = preg_replace( "/\?.*/", "", $currentURL); //omitir get info

            for($i = 0; $i < sizeof($this->sites); $i++){
                if($currentURL === $this->sites[$i]['site'] && $this->sites[$i]['access'] === 'public'){
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

        private function redirectDefaultSite(){
            error_log('SessionController::redirectDefaultSite');
            header('location:'. constant('URL').'dashboard');
        }

        function initialize($user){
            error_log("SessionController::initialize(): user: " . $user->getID());
            $this->session->setCurrentUser($user->getID());
            $this->authorizeAcess('user');                      //si se llegaran a tener mas roles
        }

        function authorizeAcess(){
            error_log('SesssionController::authorizeAccess');
            $this->redirect('dashboard', []);
        }

        function logout(){
            $this->session->closeSession();
        }
    }

?>