<?php

namespace App\Services;

use App\Repository\UsuarioRepository;
use App\Entity\Usuario;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserManager {

    private $encoder;
    private $userRepository;

    function __construct(UserPasswordEncoderInterface $encoder, UsuarioRepository $userRepository) {
        $this->encoder = $encoder;
        $this->userRepository = $userRepository;
    }

    public function createUser($parameters) {
        $user = new Usuario();
        $user->setName(ucwords(strtolower($parameters['name'])));
        $user->setSurname(ucwords(strtolower($parameters['surname'])));
        if (isset($parameters['password'])) {
            $user->setPassword($this->encoder->encodePassword($user, $parameters['password']));
        }
        if (strcmp($parameters['newPassword'], "") != 0) {
            $user->setPassword($this->encoder->encodePassword($user, $parameters['newPassword']));
        }
        $user->setEmail($parameters['email']);
        $user->setPicture("");
        return $user;
    }
    
    public function getUser($id) {
        return $this->userRepository->findOneBy([
                    'id' => $id,
        ]);
    }
    
    public function emailExists($email) {
        return $this->userRepository->findOneBy([
                    'email' => $email,
        ]);
    }


    public function deleteUser($id) {
        return $this->userRepository->deleteOneById($id);
    }

    public function updateUser($id, $user) {
        return $this->userRepository->updateOneById($id, $user);
    }


}