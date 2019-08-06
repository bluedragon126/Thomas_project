<?php


class sfGuardUserTable extends PluginsfGuardUserTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('sfGuardUser');
    }
    
    public function deleteUser($id){
        
         Doctrine_Query::create()
                            ->delete('sfGuardUser u')
                            ->where('u.id = ?',$id)
                            ->execute();
    }
    
    public function retrieveByUsername($username, $isActive = true)
    {
    $query = self::getInstance()
        ->createQuery('u')
        ->leftJoin('u.SfGuardUserProfile sup')
        ->where('sup.email = ?', $username)
        ->orWhere('u.username = ?', $username)
        ->addWhere('u.is_active = ?', $isActive);
 
    return $query->fetchOne();
    }
}