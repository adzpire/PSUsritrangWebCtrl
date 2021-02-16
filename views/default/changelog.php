
<h4>เวอร์ชั่น <?php echo Yii::$app->controller->module->params['ModuleVers']; ?></h4>
<?php
                    // $cookies = \Yii::$app->request->cookies;
                    // print_r($cookies);
                    // if (($cookie = $cookies->get($modul->params['modulecookies'])) !== null) {
                    //     if($cookie->value != $modul->params['ModuleVers']){
                    //         $delcookies = Yii::$app->response->cookies;
                    //         $delcookies->remove($modul->params['modulecookies']);
                    //     }
                    // }else{
                    //     $sysalert = true;
                    // }
                ?>

<?php echo $this->render('/_changelog'); ?>