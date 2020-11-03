<?php

/**
 * 
 */
class News 
{
  protected $errors = [],
            $id,
            $author,
            $title,
            $content,
            $createdAt,
            $modifiedAt;

  const AUTHOR_INVALID = 1;
  const TITLE_INVALID = 2;
  const CONTENT_INVALID = 3;


  /**
   * @param $values array
   * @return void
   */
  public function __construct($values = []): void
  {
    if (!empty($values))
    {
      $this->hydrate($values);
    }
  }

  public function hydrate($datas): void
  {
    foreach ($datas as $attr => $value)
    {
      $method = 'set'.ucfirst($attr);
      if(is_callable([$this, $method]))
      {
          $this->$method($value);
      }
    }
  }

  /**
   * @return bool
   */
  public function isNew(): bool
  {
    return empty($this->id);
  }

  /**
   * @return bool
   */
  public function isValid(): bool
  {
    return !(empty($this->author) || empty($this->title) || empty($this->content));
  }

  // SETTERS //

  /**
   * @return void
   */
  public function setId($id): void
  {
    $this->id = (int) $id;
  }

  /**
  * @return void
  */
  public function setAuthor($author): void
  {
    if (!is_string($author) || empty($author))
    {
      $this->errors[]= self::AUTHOR_INVALID;
    }
    else
    {
      $this->author = $author;
    }
  }

  /**
   * @return void
   */
  public function setTitle($title): void
  {
    if (!is_string($title) || empty($title))
    {
      $this->errors[]= self::TITLE_INVALID;
    }
    else
    {
      $this->title = $title;
    }
  }

  /**
   * @return void
   */
  public function setContent($content): void
  {
    if (!is_string($content) || empty($content))
    {
      $this->errors[]= self::CONTENT_INVALID;
    }
    else
    {
      $this->content = $content;
    }
  }

  /**
   * @return void
   */
  public function setCreatedAt(DateTime $createdAt): void
  {
    $this->createdAt = $createdAt;
  }

  /**
   * @return void
   */
  public function setModifieddAt(DateTime $modifiedAt): void
  {
    $this->modifiedAt = $modifiedAt;
  }

  // GETTERS //
 
  /**
   * @return array
   */
  public function getErrors(): array
  {
    return $this->errors;
  }

  /**
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }

   /**
   * @return string
   */
  public function getAuthor(): string
  {
    return $this->author;
  }

   /**
   * @return string
   */
  public function getTitle(): string
  {
    return $this->title;
  }

   /**
   * @return content
   */
  public function getContent(): string
  {
    return $this->content;
  }

   /**
   * @return dateTime
   */
  public function getCreatedAt(): DateTime
  {
    return $this->createdAt;
  }

   /**
   * @return datetime
   */
  public function getModifiedAt(): DateTime
  {
    return $this->modifiedAt;
  }

}