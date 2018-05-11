<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$this->title = 'Ksweb Control';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="site-contact">
        
        <div class="content">
            <h3>KSWEB Control</h3>
            <p>You can control KSWEB by your application via Android Broadcast messages. Note that this feature is in beta testing at the moment and this is the first version of it. List of commands will be changed and be refined over time.</p>
            <p>To apply control commands use this java class in your Android project: <?= Html::a('KSWEBControl.java', Url::to(['http://www.kslabs.ru/content/KSWEBControl.java'])); ?><br />
            The typical usage is to extend this class by your main activity. Each command requires a tag for tracking of the result of its execution. KSWEB sends an answer with a tag via 
            Broadcast after executing any command. It can be KSWEBControl.RESPOND_OK or KSWEBControl.RESPOND_ERROR.</p>
                
        
            <p>Here you can see a list of available commands to control KSWEB.</p>
            <p><strong>This group of static commands allows you to start/stop components (servers) of KSWEB</strong></p>
            <p><code>public static void ftpStart(Activity activity, String tag);<br />
            public static void ftpStop(Activity activity, String tag);</p>
            <p>public static void lighttpdStart(Activity activity, String tag);<br />
            public static void lighttpdStop(Activity activity, String tag);</p>
            <p>public static void nginxStart(Activity activity, String tag);<br />
            public static void nginxStop(Activity activity, String tag);</p>
            <p>public static void mysqlStart(Activity activity, String tag);<br />
            public static void mysqlStop(Activity activity, String tag);</code></p>
            <p><strong>These commands allow to start/close KSWEB. &#8220;Finish activity&#8221; allows to unload KSWEB from memory without shutting down servers</strong></p>
            <p><code>public static void kswebStart(Activity activity, String tag);<br />
            public static void kswebClose(Activity activity, String tag);<br />
            public static void kswebFinishActivity(Activity activity, String tag);</code></p>
            <p><strong>To configure servers use these commands</strong></p>
            <p>Content of configuration file will be replaced by data from configTxt parameter.</p>
            <p><code>public static void lighttpdSetConfig(Activity activity, String tag, String configTxt);<br />
            public static void nginxSetConfig(Activity activity, String tag, String configTxt);<br />
            public static void phpSetConfig(Activity activity, String tag, String configTxt);<br />
            public static void mysqlSetConfig(Activity activity, String tag, String configTxt);</code></p>
            <p><strong>To control http servers host list you can use these commands</strong></p>
            <p><code>public static void lighttpdAddHost(Activity activity, String tag, String hostname, String port, String rootDir);<br />
            public static void lighttpdDeleteHost(Activity activity, String tag, String hostname, String port, String rootDir);</p>
            <p>public static void nginxAddHost(Activity activity, String tag, String hostname, String port, String rootDir);<br />
            public static void nginxDeleteHost(Activity activity, String tag, String hostname, String port, String rootDir);</code></p>
        </div>
    </div>                

        <div class="content">
            <p>On purchasing of licenses, please, contact us <?= Html::a('dkcocto@gmail.com.', Url::to(['dkcocto@gmail.com', 'subject' => 'KSWEB License'])) ?><p>
        </div>

        

        