<?php

namespace App\Controllers;

use App\DB;
use App\Models\User;
use PDOException;

class UsersController
{
    public function index()
    {
        if (!$this->requireLogin()) {
            return;
        }

        $users = User::all();
        $csrfToken = $this->csrfToken();
        view('users/index', compact('users', 'csrfToken'));
    }

    public function view()
    {
        $user = $this->findUser();
        if ($user) {
            view('users/view', compact('user'));
        }
    }

    public function edit()
    {
        $user = $this->findUser();
        if ($user) {
            $this->editForm($user);
        }
    }

    public function update()
    {
        $user = $this->findUser();
        if (!$user || !$this->verifyCsrf()) {
            return;
        }

        $name = is_string($_POST['name'] ?? null) ? trim($_POST['name']) : '';
        $email = is_string($_POST['email'] ?? null) ? trim($_POST['email']) : '';
        $user->name = $name;
        $user->email = $email;

        if ($name === '' || preg_match('/^.{1,1024}$/usD', $name) !== 1
            || strlen($email) > 255 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(422);
            $this->editForm($user, 'Enter a valid name and email address.');
            return;
        }

        try {
            (new DB())->update('users', compact('name', 'email'), $user->id);
        } catch (PDOException $exception) {
            if ((int) ($exception->errorInfo[1] ?? 0) !== 1062) {
                throw $exception;
            }

            http_response_code(422);
            $this->editForm($user, 'This email address is already in use.');
            return;
        }

        redirect('/admin/users');
    }

    public function delete()
    {
        $user = $this->findUser();
        if (!$user || !$this->verifyCsrf()) {
            return;
        }

        $user->delete();
        if ((string) $user->id === (string) $_SESSION['userID']) {
            unset($_SESSION['userID'], $_SESSION['usersCsrfToken']);
            redirect('/login');
            return;
        }

        redirect('/admin/users');
    }

    private function requireLogin(): bool
    {
        if (auth()) {
            return true;
        }

        redirect('/login');
        return false;
    }

    private function findUser()
    {
        if (!$this->requireLogin()) {
            return false;
        }

        $id = $_GET['id'] ?? '';
        if (is_string($id) && preg_match('/^[1-9][0-9]{0,19}$/D', $id)) {
            $user = User::find($id);
            if ($user) {
                return $user;
            }
        }

        http_response_code(404);
        echo 'User not found.';
        return false;
    }

    private function editForm(User $user, string $error = '')
    {
        $csrfToken = $this->csrfToken();
        view('users/edit', compact('user', 'csrfToken', 'error'));
    }

    private function csrfToken(): string
    {
        return $_SESSION['usersCsrfToken'] ??= bin2hex(random_bytes(32));
    }

    private function verifyCsrf(): bool
    {
        $token = $_POST['csrf_token'] ?? null;
        if (is_string($token) && hash_equals($this->csrfToken(), $token)) {
            return true;
        }

        http_response_code(403);
        echo 'Invalid form token.';
        return false;
    }
}
