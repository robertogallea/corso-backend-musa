<?php 

// Definire due classi CredentialValidator e UserManager che definiscano le seguenti funzionalità:

// CredentialValidator
// - validate(string $username, string $password) // verifica la correttezza della password per un utente

// UserManager
// - listUsers() // mostra a video la lista degli utenti

// Definire in un trait la funzione per il caricamento degli utenti da file csv

trait CanListUsers
{
    private function loadUsers()
    {
        return [
            ['user1', md5('password')],
            ['user2', md5('password2')],
            ['admin', md5('password3')],
        ];
    }
}

class CredentialValidator
{
    use CanListUsers;

    public function validate(string $username, string $password): bool
    {
        // Caricare elenco utenti
        $users = $this->loadUsers();

        foreach ($users as $user) {
            if (($user[0] === $username) && (md5($password) === $user[1])) {
                return true;
            }
        }

        return false;

        // verificare che ne esista uno con username e hash della password corrispondente uguali
    }

}

class UserManager
{
    use CanListUsers;

    public function listUsers(): array
    {
        $users = $this->loadUsers();

        $users = array_map(fn($user) => new User($user[0], $user[1]), $users);

        return $users;
    }
}

class User
{
    protected string $username;
    protected string $passwordHash;

    public function __construct(string $username, string $passwordHash)
    {
        $this->username = $username;
        $this->passwordHash = $passwordHash;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }
}

$userManager = new UserManager();

$users = $userManager->listUsers();

foreach ($users as $id => $user) {
    echo "Utente $id: username: {$user->getUsername()}\n";
}

$credentialValidator = new CredentialValidator();

if ($credentialValidator->validate('user1', 'password')) {
    echo 'Credenziali valide' . "\n";
} else {
    echo 'Credenziali non valide' . "\n";
}

if ($credentialValidator->validate('userX', 'passwordX')) {
    echo 'Credenziali valide' . "\n";
} else {
    echo 'Credenziali non valide' . "\n";
}