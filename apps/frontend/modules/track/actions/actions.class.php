<?php

/**
 * user actions.
 *
 * @package    sisterbt
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class trackActions extends sfActions {

    public function executeUpdate($request) {
        
        if ($request->isXmlHttpRequest()) {
            $lnk = mysql_connect('localhost', 'tracker','Domino89#');
            mysql_select_db('analysis');
            $sql = 'insert into track set data = "' . $request->getReferer() . '";';
            mysql_query($sql, $lnk);
        }
        return $this->renderText('');
    }

}
