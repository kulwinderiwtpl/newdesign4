<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

class AppController extends Controller
{
    public mixed $loggedUser = null;
    public int $queryPage = 10;
    public bool $custom_js = false;

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash');

        $this->set('title', 'HCF');
        $this->queryPage = $this->request->getQuery('show') ?? 10;
    }

    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);

        $userId = $this->request->getSession()->read('Auth.User.id');

        if ($userId) {
            $usersTable = $this->fetchTable('Users');
            $this->loggedUser = $usersTable->find()
                ->contain(['Companies'])
                ->where(['Users.id' => $userId])
                ->first();
        }

        if (!$this->isAuthorized()) {
            $this->Flash->error('You are not authorized to access this page.');
            // return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        $this->custom_js = true;
        $this->set('queryPage', $this->queryPage);
        $this->set('custom_js', $this->custom_js);
    }

    public function isAuthorized(): bool
    {
        $controller = $this->request->getParam('controller');
        $action     = $this->request->getParam('action');
        $page       = $controller . '/' . $action;

        if (isset($this->loggedUser->type) && $this->loggedUser->type === 'superadmin') {
            return true;
        }

        if (isset($this->loggedUser->type) && $this->loggedUser->type === 'admin') {
            switch ($page) {
                case 'Users/admin':
                    return false;
                default:
                    return true;
            }
        }

        if (isset($this->loggedUser->type) && $this->loggedUser->type === 'member') {
            switch ($page) {
                case 'Dashboard/index':
                case 'Meetings/nextMeeting':
                case 'Meetings/pastMeetings':
                case 'Meetings/pastMeetingsSep':
                case 'Meetings/pastMeeting':
                case 'Meetings/pastMeetingSep':
                case 'Meetings/meetingsHistory':
                case 'Documents/usefulInformation':
                case 'Documents/agmAndConstitution':
                case 'Newsletters/index':
                case 'Weblinks/index':
                case 'ServiceProviders/index':
                case 'Companies/index':
                case 'Recruitments/index':
                case 'Contacts/add':
                case 'Users/profile':
                case 'InvoiceDetails/printable':
                case 'Newsletters/view':
                case 'Meetings/bookColleague':
                case 'Meetings/mergeInvoices':
                case 'Users/login':
                case 'Users/register':
                case 'Users/forgotPassword':
                case 'Users/resetPassword':
                case 'Users/logout':
                    return true;
                default:
                    return false;
            }
        }

        // Not logged in
        switch ($page) {
            case 'Users/login':
            case 'Users/register':
            case 'Users/forgotPassword':
            case 'Users/resetPassword':
                return true;
            default:
                return false;
        }
    }

    public function beforeRender(EventInterface $event): void
    {
        parent::beforeRender($event);

        $userId = $this->request->getSession()->read('Auth.User.id');

        if ($userId) {
            $usersTable = $this->fetchTable('Users');

            $this->loggedUser = $usersTable->find()
                ->contain(['Companies'])
                ->where(['Users.id' => $userId])
                ->first();

            $pending_member_count = $usersTable->find()
                ->where([
                    'Users.status' => 'P',
                    'Users.type'   => 'member',
                ])
                ->count();

            $this->set('pending_member_count', $pending_member_count);
            $this->set('fname', $this->loggedUser->first_name);
            $this->set('lname', $this->loggedUser->last_name);
            $this->set('user_type', $this->loggedUser->type);
            $this->set('loggedIn', true);
            $this->set('loggedUser', $this->loggedUser);
        } else {
            $this->set('loggedIn', false);
        }
    }

    public function displayValidationErrors(mixed $object): void
    {
        $allErrors = $object->getErrors();
        $error_msg = [];

        foreach ($allErrors as $field => $errors) {
            if (is_array($errors)) {
                foreach ($errors as $error) {
                    $error_msg[] = $field . ': ' . $error;
                }
            } else {
                $error_msg[] = $field . ': ' . $errors;
            }
        }

        if (!empty($error_msg)) {
            $this->Flash->error(
                '<b>Please fix the following error(s):</b><br/>' .
                implode('<br/>', $error_msg)
            );
        }
    }
}