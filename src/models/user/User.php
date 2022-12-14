<?php

namespace App\ZoorificsAnimals\models\user;

use App\ZoorificsAnimals\models\Refactory;
use App\ZoorificsAnimals\models\user\UserEntity;


    class User extends Refactory
    {
        /**
         * @author aurel
         * @param int $id
        */
        public function delete(int $id): void
        {
            $this->prepareAndExecute('DELETE FROM users WHERE id=:id', [
                $id
            ]);
        }
        
        /**
         * @author aurel
         * @param class $user
         * @return $ticket
        */
        public function createUser(UserEntity $user): void
        {
            $this->prepareAndExecute('INSERT INTO users (first_name, job_id, hired_at, last_name, email, phone, password VALUES(:first_name, :job_id, :hired_at, :last_name, :email, :phone, :password)', [
                ':first_name' => $user->getFirstname(),
                ':job_id' => $user->getJobId(),
                ':hired_at' => $user->getHiredAt(),
                ':last_name' => $user->getLastname(),
                ':email' => $user->getEmail(),
                ':phone' => $user->getPhone(),
                ':password' => $user->getPassword()
            ]);
            $user->setId($this->pdo->lastInsertId());
        }

        /**
         * @author aurel
         * @param class $user
         * @return $ticket
        */
        public function edit(UserEntity $user): void
        {
            $this->prepareAndExecute('UPDATE users SET first_name=:first_name, job_id=:job_id, hired_at=:hired_at, last_name=:last_name, email=:email, phone=:phone, password=:password WHERE id=:id', [
                ':first_name' => $user->getFirstname(),
                ':job_id' => $user->getJobId(),
                ':hired_at' => $user->getHiredAt(),
                ':last_name' => $user->getLastname(),
                ':email' => $user->getEmail(),
                ':phone' => $user->getPhone(),
                ':password' => $user->getPassword(),
                ':id' => $user->getId(),
            ]);
        }

        /**
         * @author aurel
         * @param int $jobId
         * @return $users[]
        */
        public function getUsers($jobId): array
        {
            if($jobId ==! null){
                $pdo = $this->prepareAndExecute('SELECT * FROM users WHERE job_id = ? ORDER BY last_name ASC', [
                    $jobId
                ]);
            }  
            else{
                $pdo = $this->prepareAndExecute('SELECT * FROM users ORDER BY last_name ASC');   
            }
            $users = [];
            foreach ($pdo->fetchAll() as $row) {
                $user = new UserEntity();
                $user->setFirstname($row['firstname']);
                $user->setLastname($row['lastname']);
                $user->setJobId($row['jobId']);
                $user->setHiredAt($row['hiredAt']);
                $user->setToken($row['token']);
                $user->setDateTokenAt($row['dateTokenAt']);
                $user->setEmail($row['email']);
                $user->setPhone($row['phone']);
                $users[] = $user;
            }

            return $users;
        }

        /**
         * @author aurel
         * @return $users[]
        */
        public function getUsersAnimator(): array
        {
            $pdo = $this->prepareAndExecute('SELECT * FROM users WHERE job_id = 9 ORDER BY last_name ASC');
            $users = [];
            foreach ($pdo->fetchAll() as $row) {
                $user = new UserEntity();
                $user->setFirstname($row['firstname']);
                $user->setLastname($row['lastname']);
                $user->setJobId($row['jobId']);
                $user->setHiredAt($row['hiredAt']);
                $user->setToken($row['token']);
                $user->setDateTokenAt($row['dateTokenAt']);
                $user->setEmail($row['email']);
                $user->setPhone($row['phone']);
                $users[] = $user;
            }

            return $users;
        }

        /**
         * @author aurel
         * @param int $id
         * @return $user
        */
        public function getUser(int $id): ?UserEntity
        {
            $this->prepareAndExecute('SELECT * FROM users WHERE id = ?', [
                $id
            ]);
            $user = new UserEntity();
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setJobId($_POST['job_id']);
            $user->setHiredAt($_POST['hiredAt']);
            $user->setEmail($_POST['email']);
            $user->setPhone($_POST['phone']);
            return $user;
        }

        /**
         * @author aurel
         * @param string $email
         * @return $user
        */
        public function getUserByEmail(int $email): ?UserEntity
        {
            $this->prepareAndExecute('SELECT * FROM users WHERE email = ?', [
                $email
            ]);
            $user = new UserEntity();
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setJobId($_POST['job_id']);
            $user->setHiredAt($_POST['hiredAt']);
            $user->setEmail($_POST['email']);
            $user->setPhone($_POST['phone']);
            return $user;
        }

     }
