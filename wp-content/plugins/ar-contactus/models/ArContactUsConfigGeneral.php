<?php
ArContactUsLoader::loadModel('ArContactUsConfigModel');

class ArContactUsConfigGeneral extends ArContactUsConfigModel
{
    public $mobile;
    public $pages;
    
    public function attributeDefaults()
    {
        return array(
            'mobile' => 1
        );
    }
    
    public function getFormTitle()
    {
        return __('General settings', AR_CONTACTUS_TEXT_DOMAIN);
    }
}
