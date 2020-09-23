<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected $table = 'users';
    
    public function getUsersList($currentUser)
    {
        $sql = 'SELECT DISTINCT users.* FROM users
                LEFT JOIN messages ON (users.id = messages.to_user OR users.id = messages.from_user)
                WHERE
                    (users.id = messages.to_user AND messages.from_user=:currentUser) OR
                    (users.id = messages.from_user AND messages.to_user=:currentUser) OR
                    (users.online=1 AND users.id<>:currentUser)';
        
        $users = $this->bdd->run($sql, [
            'currentUser' => $currentUser,
        ]);
        
        if(!empty($users)) {
            $usersId = implode(',', array_column($users, 'id'));
            $sql = 'SELECT messages.from_user, count(messages.id) as notReadCount FROM users,messages
                    WHERE
                        users.id = messages.to_user AND
                        messages.to_user=:currentUser AND
                        messages.from_user in ('.$usersId.') AND
                        messages.to_user_read=0
                    GROUP BY messages.from_user';
            $notReadCount = $this->bdd->run($sql, [
                'currentUser' => $currentUser,
            ]);
            
            foreach ($users as $index => $user) {
                foreach ($notReadCount as $count) {
                    if ($count['from_user'] == $user['id']) {
                        $users[$index]['notReadCount'] = $count['notReadCount'];
                    }
                }
            }
        }
        
        return $users;
    }
    
    public function online($status)
    {
        $this->online = $status;
        $this->save();
    }
}
