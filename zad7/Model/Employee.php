<?php
App::uses('AppModel', 'Model');
/**
 * Employee Model
 *
 */
class Employee extends AppModel {
    var $validate = array('nazwisko' => array('rule' => 'notBlank'), 'etat' => array('rule' => 'notBlank'),
    'placa_pod' => array('firstRule' => array('rule' => array('comparison', '>=', 0), 'message' => 'Placa podstawowa musi byc dodatnia'),
                   'secondRule' => array('rule' => array('comparison', '<=', 2000), 'message' => 'Placa podstawowa nie moze przekraczac 2000pln')));

}
