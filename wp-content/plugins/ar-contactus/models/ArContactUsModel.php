<?php
ArContactUsLoader::loadModel('ArContactUsModelAbstract');

class ArContactUsModel extends ArContactUsModelAbstract
{
    const TYPE_LINK = 0;
    const TYPE_INTEGRATION = 1;
    const TYPE_JS = 2;
    const TYPE_CALLBACK = 3;
    
    public $id;
    public $icon;
    public $color;
    public $link;
    public $type;
    public $display;
    public $integration;
    public $js;
    public $title;
    public $status;
    public $position;
    
    public function rules()
    {
        return array(
            array(
                array(
                    'icon',
                    'color',
                    'link',
                    'type',
                    'display',
                    'integration',
                    'js',
                    'title',
                    'status',
                    'position'
                ), 'safe'
            ),
            array(
                array(
                    'icon',
                    'color',
                    'title'
                ), 'validateRequired'
            )
        );
    }
    
    public function scheme()
    {
        return array(
            'id' => self::FIELD_INT,
            'icon' => self::FIELD_STRING,
            'color' => self::FIELD_STRING,
            'link' => self::FIELD_STRING,
            'js' => self::FIELD_STRING,
            'integration' => self::FIELD_STRING,
            'title' => self::FIELD_STRING,
            'status' => self::FIELD_INT,
            'type' => self::FIELD_INT,
            'display' => self::FIELD_INT,
            'position' => self::FIELD_INT
        );
    }
    
    public static function tableName()
    {
        return self::dbPrefix().'arcontactus';
    }
    
    public static function createTable()
    {
        return self::getDb()->query("CREATE TABLE IF NOT EXISTS `" . self::tableName() . "` (
            `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            `icon` VARCHAR(50) NULL DEFAULT NULL,
            `color` VARCHAR(10) NULL DEFAULT NULL,
            `type` TINYINT(3) UNSIGNED NULL DEFAULT '0',
            `display` TINYINT(3) UNSIGNED NULL DEFAULT '1',
            `link` VARCHAR(255) NULL DEFAULT NULL,
            `integration` VARCHAR(50) NULL DEFAULT NULL,
            `js` TEXT NULL,
            `title` VARCHAR(255) NULL DEFAULT NULL,
            `status` TINYINT(3) UNSIGNED NULL DEFAULT '1',
            `position` INT(10) UNSIGNED NULL DEFAULT '0',
            PRIMARY KEY (`id`),
            INDEX `position` (`position`)
        )
        COLLATE='utf8_general_ci';");
    }
    
    public static function dropTable()
    {
        return self::getDb()->query("DROP TABLE IF EXISTS `" . self::tableName() . "`");
    }
    
    public static function getLastPostion()
    {
        $model = self::find()->orderBy('`position` DESC')->one();
        return $model? $model->position : 0;
    }
    
    public static function getDefaultMenuItems()
    {
        return array(
            array(
                'icon' => 'facebook-messenger',
                'color' => '567AFF',
                'link' => 'https://m.me/[mypage]',
                'title' => 'Messenger',
                'display' => 1,
                'type' => 0,
                'status' => 0
            ),
            array(
                'icon' => 'whatsapp',
                'color' => '1EBEA5',
                'link' => 'https://www.whatsapp.com/',
                'title' => 'Whatsapp',
                'display' => 1,
                'type' => 0,
                'status' => 0
            ),
            array(
                'icon' => 'viber',
                'color' => '812379',
                'link' => 'viber://pa?chatURI=[nickname]',
                'title' => 'Viber',
                'display' => 1,
                'type' => 0,
                'status' => 0
            ),
            array(
                'icon' => 'slack-hash',
                'color' => '3EB891',
                'link' => 'https://slack.com',
                'title' => 'Slack',
                'display' => 1,
                'type' => 0,
                'status' => 0
            ),
            array(
                'icon' => 'telegram-plane',
                'color' => '20AFDE',
                'link' => 'https://t.me/[nickname]',
                'title' => 'Telegram',
                'display' => 1,
                'type' => 0,
                'status' => 0
            ),
            array(
                'icon' => 'skype',
                'color' => '1C9CC5',
                'link' => 'skype://[nickname]?chat',
                'title' => 'Skype',
                'display' => 1,
                'type' => 0,
                'status' => 0
            ),
            array(
                'icon' => 'envelope',
                'color' => 'FF643A',
                'link' => 'mailto:[email@mysite.com]',
                'title' => 'Email us',
                'display' => 1,
                'type' => 0,
                'status' => 0
            ),
            array(
                'icon' => 'phone',
                'color' => '4EB625',
                'link' => 'callback',
                'title' => 'Callback request',
                'display' => 1,
                'type' => 0,
                'status' => 1
            ),
        );
    }
    
    public static function createDefaultMenuItems()
    {
        foreach (self::getDefaultMenuItems() as $k => $item){
            $model = new self();
            $model->icon = $item['icon'];
            $model->color = $item['color'];
            $model->link = $item['link'];
            $model->title = $item['title'];
            $model->status = $item['status'];
            $model->type = $item['type'];
            $model->display = $item['display'];
            $model->position = $k + 1;
            $model->save();
        }
    }
}
