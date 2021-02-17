<?php

/**
 * objet Message
 */
class Messages
{
  /**
   * id du message
   * @var int
   */
  private $id;
  /**
   * nom de l'utilisateur
   * @var string
   */
  private $lastName;
  /**
   * prenom de l'utilisateur
   * @var string
   */
  private $firstName;
  /**
   * email de l'utilisateur
   * @var string
   */
  private $email;
  /**
   * sujet de message
   * @var string
   */
  private $sujet;
  /**
   * contenu de message
   * @var string
   */
  private $content;

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
   * Obtenez la valeur du nom de l'utilisateur
   */
  public function getLastName()
  {
    return $this->lastName;
  }
  /**
   * Définir la valeur du nom de l'utilisateur
   *
   * @return  self
   */
  public function setLastName($lastName)
  {
    $this->lastName = $lastName;
  }
  /**
   * Obtenez la valeur du prénom de l'utilisateur
   */
  public function getFirstName()
  {
    return $this->firstName;
  }
  /**
   * Définir la valeur du prénom de l'utilisateur
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
   * Obtenez la valeur du sujet du message
   */
  public function getSujet()
  {
    return $this->sujet;
  }
  /**
   * Définir la valeur du sujet du message
   *
   * @return  self
   */
  public function setSujet($sujet)
  {
    $this->sujet = $sujet;
  }
  /**
   * Obtenez la valeur du contenu du message
   */
  public function getContent()
  {
    return $this->content;
  }
  /**
   * Définir la valeur du contenu du message
   *
   * @return  self
   */
  public function setContent($content)
  {
    $this->content = $content;
  }

  /**
   * Récuperation de tous les messages
   * @return void
   */
  public function getAllAdmin()
  {
    $cnx = new Database();
    $db=$cnx->queryPage('SELECT id, lastName, firstName, email, sujet, content FROM `messages` 
    LIMIT :premier, :parpage');
    return $db;
  }

  /**
   * Récuperation du nombre de messages
   * @return void
   */
  public function getNbrAdmin()
  {
    $cnx = new Database();
    $db = $cnx->query('SELECT COUNT(*)as nbr FROM `messages`');
    return $db;
  }

  /**
   * Insertion d'un nouveau message
   *
   * @return void
   */
  public function insert()
  {
    //connexion à la base 
    $cnx = new Database();
    $db = $cnx->executeSql("INSERT INTO `messages` (`lastName`, `firstName`, `email`, `sujet`, `content`) VALUES ( ?, ?, ?, ?, ?)", [$this->lastName, $this->firstName, $this->email, $this->sujet, $this->content]);

    $flash = new FlashService();
    $flash->add('Votre message a bien été envoyé.');
  }

  /**
     * Récuperation d'un élément par l'id du message
     *
     * @param integer $id
     * @return void
     */
  public function getOne(int $id)
  {
    //connexion à la base 
    $cnx = new Database();
    $db = $cnx->queryOne('SELECT id, `lastName`, `firstName`, `email`, `sujet`, `content`
        FROM messages
        WHERE id=?', [$id]);
    return $db;
  }
}
