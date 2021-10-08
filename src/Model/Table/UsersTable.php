<?php
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;  //як варіант для унікальності імен
use Cake\ORM\Rule\IsUnique;


class UsersTable extends Table
{


    public function validationDefault(Validator $validator)
    {

        return $validator
            ->notEmpty('name', 'A username is required')
            ->add(
                'name',
                ['unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'This name already using,select another name']
                ]
            )
            ->notEmpty('email', 'A username is required')
            ->add(
                'email', 
                ['unique' => [
                    'rule' => 'email',
                    'provider' => 'table',
                    'message' => 'This email already using,select another name']
                ]
            )
            ->notEmpty('password', 'A password is required');
//            ->add('role', 'inList', [
//                'rule' => ['inList', ['admin', 'user','superadmin']],
//                'message' => 'Please enter a valid role'
//            ]);


    }



    // як варіант для унікальності


    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email'], 'email already exist.'));
        $rules->add($rules->isUnique(['name'], 'name already exist.'));

        return $rules;
    }


}
