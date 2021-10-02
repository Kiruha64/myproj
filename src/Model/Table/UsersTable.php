<?php
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;  //як варіант для унікальності імен

class UsersTable extends Table
{


    public function validationDefault(Validator $validator)
    {

        return $validator
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add(
                'username',
                ['unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'This name already using,select another name']
                ]
            )
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'user','superadmin']],
                'message' => 'Please enter a valid role'
            ]);


    }



    // як варіант для унікальності
//    public function buildRules(RulesChecker $rules)
//    {
//        $rules->add($rules->isUnique(['username'], 'User already exist.'));
//        return $rules;
//    }


}
