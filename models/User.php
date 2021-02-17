<?php

/**
 * objet Message
 */
class User
{
    /**
     * id du user
     * @var int
     */
    private $id;
    /**
     * nom de l'utilisateur
     * @var string
     */
    private $lastName;
    /**
     * prénom de l'utilisateur
     * @var string
     */
    private $firstName;
    /**
     * email de l'utilisateur
     * @var string
     */
    private $email;
    /**
     * password de l'utilisateur
     * @var string
     */
    private $password;
    /**
     * date de naissance de l'utilisateur
     * @var string
     */
    private $birthday;
    /**
     * adresse de l'utilisateur
     * @var string
     */
    private $address;
    /**
     * code postal de l'utilisateur
     * @var string
     */
    private $zipCode;
    /**
     * ville de l'utilisateur
     * @var string
     */
    private $city;
    /**
     * pays de l'utilisateur
     * @var string
     */
    private $country;
    /**
     * telephone de l'utilisateur
     * @var string
     */
    private $phone;
    /**
     * type de l'utilisateur
     * @var int
     */
    private $admin;

    /**
     * Obtenez la valeur de l'id du message
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Définir la valeur de id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * Obtenez la valeur du nom de l 'utilisateur
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    /**
     * Définir la valeur du nom de l 'utilisateur
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    /**
     * Obtenez la valeur du prénom de l 'utilisateur
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    /**
     * Définir la valeur du prénom de l 'utilisateur
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    /**
     * Obtenez la valeur de l'email de l'utilisateur
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Définir la valeur de l'email de l'utilisateur
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    /**
     * Obtenez la valeur du mot de passe de l'utilisateur
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Définir la valeur du mot de passe  de l'utilisateur
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    /**
     * Obtenez la valeur de la date de naissance de l'utilisateur
     */
    public function getBirthday()
    {
        return $this->birthday;
    }
    /**
     * Définir la valeur de la date de naissance de l'utilisateur
     *
     * @return  self
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }
    /**
     * Obtenez la valeur de l'adresse de l 'utilisateur
     */
    public function getAddress()
    {
        return $this->address;
    }
    /**
     * Définir la valeur de l'adresse de l'utilisateur
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
    /**
     * Obtenez la valeur du code postal de l 'utilisateur
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
    /**
     * Définir la valeur du code postal de l'utilisateur
     *
     * @return  self
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }
    /**
     * Obtenez la valeur de la ville de l 'utilisateur
     */
    public function getCity()
    {
        return $this->city;
    }
    /**
     * Définir la valeur de la ville de l'utilisateur
     *
     * @return  self
     */
    public function setCity($city)
    {
        $this->city = $city;
    }
    /**
     * Obtenez la valeur du pays de l 'utilisateur
     */
    public function getCountry()
    {
        return $this->country;
    }
    /**
     * Définir la valeur du pays de l'utilisateur
     *
     * @return  self
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
    /**
     * Obtenez la valeur du telephone de l 'utilisateur
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * Définir la valeur du telephone de l'utilisateur
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    /**
     * Obtenez la valeur du type d'utilisateur
     */
    public function getAdmin()
    {
        return $this->admin;
    }
    /**
     * Définir la valeur du type d'utilisateur
     *
     * @return  self
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    /**
     * Récuperation de tous les administarateur
     * @return void
     */
    public function getAllAdmin()
    {
        $cnx = new Database();
        $db = $cnx->query("SELECT 
        `id`, 
        `lastName`,
        `firstName`,
        `email`, 
        `password`,
        `birthDay`,
        `address`, 
        `city`, 
        `zipCode`, 
        `country`, 
        `phone`,`admin` FROM `user`WHERE `admin`=1");
        return $db;
    }
    /**
     * Récuperation de tous les utilisateurs
     * @return void
     */
    public function getAllUser()
    {
        $cnx = new Database();
        $db = $cnx->queryPage("SELECT
        `id`, 
        `lastName`,
        `firstName`,
        `email`, 
        `password`,
        `birthDay`,
        `address`, 
        `city`, 
        `zipCode`, 
        `country`, 
        `phone`,`admin` FROM `user`WHERE `admin`=0 LIMIT :premier, :parpage");
        //var_dump($db);die;
        return $db;
    }
    public function getNbrAdmin()

    {
        $cnx = new Database();
        $db = $cnx->query('SELECT COUNT(*)as nbr FROM `user` ');
        return $db;
    }

    /**
     * Récuperation d'un élément par son l'id 
     *
     * @param integer $id
     * @return void
     */
    public function getOne($id)
    {
        $cnx = new Database();
        $db = $cnx->queryOne('SELECT
        `id`, 
        `lastName`,
        `firstName`,
        `email`, 
        `password`,
        `birthDay`,
        `address`, 
        `city`, 
        `zipCode`, 
        `country`, 
        `phone`,`admin` FROM user WHERE id=?', [$id]);
        return $db;
    }


    /**
     * Insertion d'un nouveau utilisateur
     *
     * @return void
     */
    public function insertUser($lastName, $firstName, $email, $password, $birthday, $address, $city, $zipCode, $country, $phone, $admin)
    {

        // si l email n'existe pas dans la base on insert sinon message d'ereur

        $cnx = new Database();
        $user = $cnx->queryOne('SELECT 
        `id`, 
        `lastName`,
        `firstName`,
        `email`, 
        `password`,
        `birthDay`,
        `address`, 
        `city`, 
        `zipCode`, 
        `country`, 
        `phone`,`admin`from `user` WHERE email=?', [$email]);

        if ($user) {
            //genere une nouvelle exeption (erreur)
            throw new DomainException("Il existe déjà un compte utilisateur avec cette adresse e-mail");
        }
        $db = $cnx->executeSql(
            'INSERT INTO `user` 
        (
        `lastName`,
        `firstName`,
        `email`, 
        `password`,
        `birthDay`,
        `address`, 
        `city`, 
        `zipCode`, 
        `country`, 
        `phone`,
        `admin`)
        VALUES (?, ?, ?, ?, ?, ?,?, ?, ?, ?,?)',
            [$lastName, $firstName, $email, password_hash($password, PASSWORD_BCRYPT), $birthday, $address, $city, $zipCode, $country, $phone, $admin]
        );

        // Ajout d'un message de notification qui s'affichera sur la page de login.
        $flash = new FlashService();
        $flash->add('Votre compte utilisateur a bien été créé.');
    }

    /**
     * Insertion d'un nouveau administarteur
     *
     * @return void
     */
    public function insertAdmin($lastName, $firstName, $email, $password, $birthday, $address, $city, $zipCode, $country, $phone, $admin)
    {
        $cnx = new Database();
        $user = $cnx->queryOne('SELECT 
        `id`, 
        `lastName`,
        `firstName`,
        `email`, 
        `password`,
        `birthDay`,
        `address`, 
        `city`, 
        `zipCode`, 
        `country`, 
        `phone`,`admin`  from `user` WHERE email=?', [$email]);
        // si l email existe dans la base on envoie un message d'ereur
        if ($user) {
            //genere une nouvelle exeption (erreur)
            throw new DomainException("Il existe déjà un compte administrateur avec cette adresse");
        }
        // si l email n'existe pas dans la base on insert 
        $db = $cnx->executeSql(
            'INSERT INTO `user` 
        (
        `lastName`,
        `firstName`,
        `email`, 
        `password`,
        `birthDay`,
        `address`, 
        `city`, 
        `zipCode`, 
        `country`, 
        `phone`,
        `admin`)
        VALUES (?, ?, ?, ?, ?, ?,?, ?, ?, ?,?)',
            [$lastName, $firstName, $email, password_hash($password, PASSWORD_BCRYPT), $birthday, $address, $city, $zipCode, $country, $phone, $admin]
        );

        // Ajout d'un message de notification qui s'affichera sur la page de login.
        $flash = new FlashService();
        $flash->add('Votre compte administrateur a bien été créé.');
    }
    /**
     * Récuperation d'un élément par son email
     *
     * @param integer $id
     * @return void
     */
    public function getUserByMail($email)
    {
        $cnx = new Database();
        $user = $cnx->queryOne('SELECT 
        `id`, 
        `lastName`,
        `firstName`,
        `email`, 
        `password`,
        `birthDay`,
        `address`, 
        `city`, 
        `zipCode`, 
        `country`, 
        `phone`,`admin`from `user` WHERE email=?', [$email]);
        return $user;
    }
    public function VeryfMail($email)
    {
        $cnx = new Database();
        $user = $cnx->queryOne('SELECT 
        `email`,id 
       from `user` WHERE email=?', [$email]);
        if ($user == null) {
            $flash = new FlashService();
            $flash->add('Email inexistante');
        }
        return $user;
    }

    /**
     * Modification de l'élément
     *
     * @return void
     */
    public function edit($lastName, $firstName, $email, $password, $birthday, $address, $city, $zipCode, $country, $phone, $admin, $id)
    {
        $cnx = new Database();
        $db = $cnx->executeSql("UPDATE `user` 
     SET  `LastName`=?,
     `FirstName`=?,
     `Email`=?, 
     `Password`=?,
     `BirthDay`=?,
     `Address`=?, 
     `City`=?, 
     `ZipCode`=?, 
     `Country`=?, 
     `Phone`=?,
     Admin = ? WHERE user.id = ?", [$lastName, $firstName, $email, password_hash($password, PASSWORD_BCRYPT), $birthday, $address, $city, $zipCode, $country, $phone, $admin, $id]);

        // Ajout d'un message de notification qui s'affichera sur la page de edituser.
        $flash = new FlashService();
        $flash->add('Votre compte a bien été modifié.');
        return $db;
    }

    /**
     * Supression d'un administrateur
     *
     * @param int $id
     * @return void
     */
    public function deleteAdmin($id)
    {

        $cnx = new Database();
        $db = $cnx->executeSql(" DELETE FROM `user` WHERE `user`.`id` = ? ", [$id]);
        return $db;
        $flash = new FlashService();
        $flash->add('Votre administrateur a bien été supprimer.');
    }

    /**
     * fonction magique retourne une chaine de caractère
     *
     * @return string
     */
    public function __toString()
    {
        return $this->lastName . " " . $this->firstName . " " . $this->email . " " . password_hash($this->password, PASSWORD_BCRYPT) . " " . $this->address . " " . $this->city . " " . $this->country;
    }
}
