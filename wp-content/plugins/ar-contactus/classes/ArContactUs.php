<?php
ArContactUsLoader::loadClass('ArContactUsAbstract');
ArContactUsLoader::loadModel('ArContactUsModel');
ArContactUsLoader::loadModel('ArContactUsCallbackModel');
ArContactUsLoader::loadModel('ArContactUsPromptModel');

class ArContactUs extends ArContactUsAbstract
{
    public function css()
    {
        return array(
            'jquery.contactus.css' => 'res/css/jquery.contactus.min.css'
        );
    }
    
    public function js()
    {
        return array(
            'jquery' => null,
            'jquery.contactus.scripts' => 'res/js/scripts.js',
            'jquery.contactus.min.js' => 'res/js/jquery.contactus.min.js'
        );
    }
    
    public function init()
    {
        $this->registerCss();
        $this->registerJs();
        add_action('wp_footer', array($this, 'renderContactUsButton'));
        add_action('wp_enqueue_scripts', array($this, 'registerAjaxScript'));
    }
    
    public function registerAjaxScript()
    {
        wp_localize_script('jquery.contactus.min.js', 'arcontactusAjax', 
            array(
                'url' => admin_url('admin-ajax.php')
            )
	);
    }

    public function renderContactUsButton()
    {
        $generalConfig = new ArContactUsConfigGeneral('arcug_');
        $generalConfig->loadFromConfig();
        if ($generalConfig->pages){
            $currentPage = $_SERVER['REQUEST_URI'];
            $excludePages = explode(PHP_EOL, $generalConfig->pages);
            foreach ($excludePages as $page){
                $p = str_replace(array("\n", "\r"), '', $page);
                if ($currentPage == $p){
                    return null;
                }
            }
        }
        if (!$generalConfig->mobile && $this->isMobile()){
            return null;
        }
        $buttonConfig = new ArContactUsConfigButton('arcub_');
        $menuConfig = new ArContactUsConfigMenu('arcum_');
        $popupConfig = new ArContactUsConfigPopup('arcup_');
        $promptConfig = new ArContactUsConfigPrompt('arcupr_');
        $liveChatsConfig = new ArContactUsConfigLiveChat('arcul_');
        $buttonConfig->loadFromConfig();
        $menuConfig->loadFromConfig();
        $popupConfig->loadFromConfig();
        $promptConfig->loadFromConfig();
        $liveChatsConfig->loadFromConfig();
        $models = ArContactUsModel::find()->where(array('status' => 1))->orderBy('`position` ASC')->all();
        if ($popupConfig->recaptcha && $popupConfig->key){
            wp_register_script('arcontactus-google-recaptcha-v3', 'https://www.google.com/recaptcha/api.js?render=' . $popupConfig->key, array('jquery'), AR_CONTACTUS_VERSION);
            wp_enqueue_script('arcontactus-google-recaptcha-v3');
        }
        if ($popupConfig->phone_mask_on && $popupConfig->maskedinput) {
            wp_register_script('arcontactus-masked-input', AR_CONTACTUS_PLUGIN_URL . 'res/js/jquery.maskedinput.min.js', array('jquery'), AR_CONTACTUS_VERSION);
            wp_enqueue_script('arcontactus-masked-input');
        }
        if ($buttonConfig->drag){
            wp_enqueue_script('jquery-ui-draggable');
        }
        $items = array();
        $tawkTo = false;
        $crisp = false;
        $intercom = false;
        $facebook = false;
        $vkChat = false;
        $skype = false;
        $zopim = false;
        foreach ($models as $model){
            if ($model->display == 1 || ($model->display == 2 && !$this->isMobile()) || ($model->display == 3 && $this->isMobile())) {
                $item = array(
                    'href' => $model->link,
                    'color' => '#' . $model->color,
                    'title' => $model->title,
                    'id' => 'msg-item-' . $model->id,
                    'class' => 'msg-item-' . $model->icon,
                    'type' => $model->type,
                    'integration' => $model->integration,
                    'js' => $model->js,
                    'icon' => ArContactUsConfigModel::getIcon($model->icon)
                );
                switch ($model->integration){
                    case 'tawkto':
                        $tawkTo = true;
                        break;
                    case 'crisp':
                        $crisp = true;
                        break;
                    case 'intercom':
                        $intercom = true;
                        break;
                    case 'facebook':
                        $facebook = true;
                        break;
                    case 'vk':
                        $vkChat = true;
                        break;
                    case 'zopim':
                        $zopim = true;
                        break;
                    case 'skype':
                        $skype = true;
                        break;
                }
                $items[] = $item;
            }
        }
        echo self::render('front/button.php', array(
            'generalConfig' => $generalConfig,
            'buttonConfig' => $buttonConfig,
            'menuConfig' => $menuConfig,
            'popupConfig' => $popupConfig,
            'promptConfig' => $promptConfig,
            'liveChatsConfig' => $liveChatsConfig,
            'buttonIcon' => ArContactUsConfigModel::getIcon($buttonConfig->button_icon),
            'tawkTo' => $liveChatsConfig->isTawkToIntegrated() && $tawkTo,
            'crisp' => $liveChatsConfig->isCrispIntegrated() && $crisp,
            'intercom' => $liveChatsConfig->isIntercomIntegrated() && $intercom,
            'facebook' => $liveChatsConfig->isFacebookChatIntegrated() && $facebook,
            'vkChat' => $liveChatsConfig->isVkIntegrated() && $vkChat,
            'zopim' => $liveChatsConfig->isZopimIntegrated() && $zopim,
            'skype' => $liveChatsConfig->isSkypeIntegrated() && $skype,
            'messages' => ArContactUsPromptModel::getMessages(),
            'items' => $items,
            'isMobile' => $this->isMobile()
        ));
    }


    public function activate()
    {
        if (!get_option('arcu_installed')){
            ArContactUsModel::createTable();
            ArContactUsModel::createDefaultMenuItems();
            ArContactUsCallbackModel::createTable();
            ArContactUsPromptModel::createTable();
            ArContactUsPromptModel::createDefaultItems();
            
            $generalConfig = new ArContactUsConfigGeneral('arcug_');
            $buttonConfig = new ArContactUsConfigButton('arcub_');
            $menuConfig = new ArContactUsConfigMenu('arcum_');
            $popupConfig = new ArContactUsConfigPopup('arcup_');
            $promptConfig = new ArContactUsConfigPrompt('arcupr_');
            
            $generalConfig->loadDefaults();
            $generalConfig->saveToConfig();
            
            $buttonConfig->loadDefaults();
            $buttonConfig->saveToConfig();
            
            $menuConfig->loadDefaults();
            $menuConfig->saveToConfig();
            
            $popupConfig->loadDefaults();
            $popupConfig->saveToConfig();
            
            $promptConfig->loadDefaults();
            $promptConfig->saveToConfig();
            
            update_option('arcu_installed', time());
        }
        return true;
    }
}
