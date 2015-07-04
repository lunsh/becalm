<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Events controller
 *
 *
 * @package       app.Controller
 */
class EventsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
    public function index() {
        $id = $this->Auth->user('id');
        $events = $this->Event->findAllByUserId($id);

        $this->set('events', $events);
    }
    
    public function add() {
        if ($this->request->is('post')) {
            $this->Event->create();
            $this->request->data['Event']['user_id'] = $this->Auth->user('id');
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('Your event has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your event.'));
        }
    }
    
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid event'));
        }

        $event = $this->Event->findById($id);
        if (!$event) {
            throw new NotFoundException(__('Invalid event'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Event->id = $id;
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('Your event has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your event.'));
        }

        if (!$this->request->data) {
            $this->request->data = $event;
        }
    }
    
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Event->delete($id)) {
            $this->Session->setFlash(
                __('The event with id: %s has been deleted.', h($id))
            );
        } else {
            $this->Session->setFlash(
                __('The event with id: %s could not be deleted.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }
    
    public function isAuthorized($user) {
        // All registered users can add events
        if ($this->action === 'add') {
            return true;
        }

        // The owner of an event can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $eventId = (int) $this->request->params['pass'][0];
            if ($this->Event->isOwnedBy($eventId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
}