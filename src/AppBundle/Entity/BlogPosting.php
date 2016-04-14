<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dunglas\ApiBundle\Annotation\Iri;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A blog post.
 *
 * @see http://schema.org/BlogPosting Documentation on Schema.org
 *
 * @ORM\Entity
 * @Iri("http://schema.org/BlogPosting")
 */
class BlogPosting
{
    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISHED = 'published';
    const STATUS_TRASH = 'trash';

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string The actual body of the article.
     *
     * @ORM\Column(type="string", nullable=false)
     * @Assert\Type(type="string")
     * @Groups({"blog_posting_read", "blog_posting_write"})
     */
    private $title;

    /**
     * @var string The actual body of the article.
     *
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Type(type="string")
     * @Groups({"blog_posting_read", "blog_posting_write"})
     * @Iri("https://schema.org/articleBody")
     */
    private $articleBody;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"blog_posting_read", "blog_posting_write"})
     */
    private $category;

    /**
     * @var Person.
     *
     * @ORM\ManyToOne(targetEntity="Person", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"blog_posting_read", "blog_posting_write"})
     * @Iri("https://schema.org/author")
     */
    private $author;

    /**
     * @var \DateTime.
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime()
     * @Groups({"blog_posting_read", "blog_posting_write"})
     * @Iri("https://schema.org/dateCreated")
     */
    private $dateCreated;

    /**
     * @var \DateTime.
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime()
     * @Groups({"blog_posting_read", "blog_posting_write"})
     * @Iri("https://schema.org/datePublished")
     */
    private $datePublished;

    /**
     * @var string
     *
     * @ORM\Column(nullable=false)
     * @Groups({"blog_posting_read", "blog_posting_write"})
     */
    private $status;

    /**
     * Returns the article status list.
     *
     * @return array
     */
    public static function getStatusList()
    {
        return array(
            self::STATUS_TRASH   => 'trash',
            self::STATUS_DRAFT => 'draft',
            self::STATUS_PUBLISHED => 'published',
        );
    }

    /**
     * Gets id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getArticleBody()
    {
        return $this->articleBody;
    }

    /**
     * @param string $articleBody
     */
    public function setArticleBody($articleBody)
    {
        $this->articleBody = $articleBody;
    }

    /**
     * @return Person
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param Person $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return \DateTime
     */
    public function getDatePublished()
    {
        return $this->datePublished;
    }

    /**
     * @param \DateTime $datePublished
     */
    public function setDatePublished($datePublished)
    {
        $this->datePublished = $datePublished;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
