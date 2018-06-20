<?php
/**
 * the migrate for this project init.
 */

use yii\db\Migration;
use backendplus\models\AdminUser;

class m180307_112551_db_init_v1 extends Migration
{
    public function up()
    {
        
        //category
        $this->createTable('category', [
            'cat_id' => $this->primaryKey()->unsigned(),
            'cat_title' => $this->string(45)->notNull()->unique(),
            'cat_desc' => $this->string(500),
            'cat_creationDate' => $this->dateTime(),
            'cat_creationUser_id' => $this->integer()->unsigned(),
            'cat_updateDate' => $this->dateTime(),
            'cat_updateUser_id' => $this->integer()->unsigned(),
            'cat_sortOrder' => $this->smallInteger()->unsigned(),
        ]);
        
        //industry
        $this->createTable('industry', [
                'i_id' => $this->primaryKey()->unsigned(),
                'i_category_id' => $this->integer()->unsigned()->notNull(),
                'i_title' => $this->string(45)->notNull(),
                'i_desc' => $this->string(500),
                'i_creationDate' => $this->dateTime(),
                'i_creationUser_id' => $this->integer()->unsigned(),
                'i_updateDate' => $this->dateTime(),
                'i_updateUser_id' => $this->integer()->unsigned(),
                'i_sortOrder' => $this->smallInteger()->unsigned(),
        ]);
        $this->addForeignKey('iCategory', 'industry', 'i_category_id', 'category', 'cat_id', 'CASCADE', 'CASCADE');
        
        //hotword
        $this->createTable('hotword', [
                'h_id' => $this->primaryKey()->unsigned(),
                'h_industry_id' => $this->integer()->unsigned()->notNull(),
                'h_title' => $this->string(45)->notNull(),
                'h_desc' => $this->string(500),
                'h_creationDate' => $this->dateTime(),
                'h_creationUser_id' => $this->integer()->unsigned(),
                'h_updateDate' => $this->dateTime(),
                'h_updateUser_id' => $this->integer()->unsigned(),
                'h_sortOrder' => $this->smallInteger()->unsigned(),
        ]);
        $this->addForeignKey('hwIndustry', 'hotword', 'h_industry_id', 'industry', 'i_id', 'CASCADE', 'CASCADE');
        
        //city
        $this->createTable('city', [
                'c_id' => $this->primaryKey()->unsigned(),
                'c_title' => $this->string(45)->notNull()->unique(),
                'c_desc' => $this->string(500),
                'c_creationDate' => $this->dateTime(),
                'c_creationUser_id' => $this->integer()->unsigned(),
                'c_updateDate' => $this->dateTime(),
                'c_updateUser_id' => $this->integer()->unsigned(),
                'c_sortOrder' => $this->smallInteger()->unsigned(),
        ]);
        
        //account
        $this->createTable('account', [
                'a_id' => $this->primaryKey()->unsigned(),
                'a_type_id' => 'tinyint unsigned ',
                'a_phone' => $this->string(20)->notNull()->unique(),
                'a_pass' => $this->string(80),
                'a_sexy_id' => 'tinyint unsigned',
                'a_filePath' => $this->string(45),
                'a_title' => $this->string(45),
                'a_qq' => $this->string(20),
                'a_wechat' => $this->string(45),
                'a_email' => $this->string(255),
                'a_province_id' => $this->integer()->unsigned(),
                'a_city_id' => $this->integer()->unsigned(),
                'a_cityTitle' => $this->string(45),
                'a_district_id' => $this->integer()->unsigned(),
                'a_add' => $this->string(255),
                'a_sourceKeyword' => $this->string(45),
                'a_lastLoginDate' => $this->dateTime(),
                'a_authKey' => $this->string(45),
                'a_creationDate' => $this->dateTime(),
                'a_creationUser_id' => $this->integer()->unsigned(),
                'a_updateDate' => $this->dateTime(),
                'a_updateUser_id' => $this->integer()->unsigned(),
                'a_sortOrder' => $this->smallInteger()->unsigned(),
                'a_isDeleted' => 'tinyint unsigned not null default 0 ',
        ]);
        
        //accountHotword
        $this->createTable('accountHotword', [
                'ah_id' => $this->primaryKey()->unsigned(),
                'ah_account_id' => $this->integer()->unsigned()->notNull(),
                'ah_city' => $this->string(45),
                'ah_industry' => $this->string(45),
                'ah_hotword' => $this->string(100),
                'ah_creationDate' => $this->dateTime(),
                'ah_creationUser_id' => $this->integer()->unsigned(),
                'ah_updateDate' => $this->dateTime(),
                'ah_updateUser_id' => $this->integer()->unsigned(),
                'ah_sortOrder' => $this->smallInteger()->unsigned(),
        ]);
        $this->addForeignKey('ahAccount', 'accountHotword', 'ah_account_id', 'account', 'a_id', 'CASCADE', 'CASCADE');
        
        
        
        //adminUser
        $this->createTable('adminUser', [
                'u_id' => $this->primaryKey()->unsigned(),
                'u_username' => $this->string(255)->notNull()->unique(),
                'u_password' => $this->string(255)->notNull(),
                'u_email' => $this->string(255),
                'u_emailValidated' => 'tinyint unsigned NULL DEFAULT "0"',
                'u_sendEmail' => 'tinyint unsigned NULL DEFAULT "0"',
                'u_authKey' => $this->string(150),
                'u_userSource_id' => $this->integer()->unsigned(),
                'u_authRole_id' => $this->integer()->unsigned()->defaultValue(100),
                'u_firstName' => $this->string(50),
                'u_lastName' => $this->string(50),
                'u_displayName' => $this->string(45)->notNull(),
                'u_sexy_id' => 'tinyint unsigned NULL DEFAULT "0"',
                'u_phone' => $this->string(45),
                'u_tel' => $this->string(45),
                'u_position' => $this->string(45),
                'u_weChat' => $this->string(45),
                'u_wcQR' => $this->string(45),
                'u_qq' => $this->string(45),
                'u_linkedIn' => $this->string(45),
                'u_avatar' => $this->string(255),
                'u_appLocale_id' => $this->smallInteger()->unsigned()->defaultValue(2),
                'u_actived' => 'tinyint unsigned NULL DEFAULT "1"',
                'u_deleted' => 'tinyint unsigned NULL DEFAULT "0"',
                'u_lastPassChangeDate' => $this->dateTime(),
                'u_creationDate' => $this->dateTime(),
                'u_creationUser_id' => $this->integer()->unsigned(),
                'u_updateDate' => $this->dateTime(),
                'u_updateUser_id' => $this->integer()->unsigned(),
                'u_sortOrder' => $this->smallInteger()->unsigned(),
        ]);
        
        $this->insertData();
        
    

    }

    public function down()
    {
        //drop foreign key first
        $this->dropForeignKey('iCategory', 'industry');
        $this->dropForeignKey('hwIndustry', 'hotword');
        $this->dropForeignKey('ahAccount', 'accountHotword');
        
        
        
        //drop tables
        $this->dropTable('category');
        $this->dropTable('industry');
        $this->dropTable('hotword');
        $this->dropTable('city');
        $this->dropTable('account');
        $this->dropTable('accountHotword');
        $this->dropTable('adminUser');
    }

    /**
     * Basic data for app run
     * like default adminUser
     */
    public function insertData(){
        $au = new AdminUser();
        $au->scenario = 'migrate';
        $au->u_username = 'eeTest';
        $au->u_displayName = 'eeTest';
        $au->password_new = '123';
        $au->save();
    }
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
    