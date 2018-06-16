<?php
/**
 * Created by PhpStorm.
 * User: Elliot
 * Date: 01/06/2018
 * Time: 15:42
 */

namespace Front\BonPlanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * PubliciteArticle
 *
 * @ORM\Table(name="PubliciteArticle")
 * @ORM\Entity(repositoryClass="Front\BonPlanBundle\Repository\PubliciteArticleRepository")
 * @Vich\Uploadable
 */
class PubliciteArticle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=254, nullable=true)
     */
    private $etat = "en attente";

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepublication", type="datetime", nullable=true)
     */

    private $datepublication;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateeffet", type="datetime", nullable=true)
     */

    private $dateeffet;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateexpiration", type="datetime", nullable=true)
     */

    private $dateexpiration;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @var string
     *
     * @ORM\Column(name="image_name", type="string", length=255, nullable=true)
     */
    private $imageName;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idarticle", referencedColumnName="idArticle")
     * })
     */
    private $Article;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Publicite")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="idpublicite", referencedColumnName="idpublicite")
     * })
     */
    private $publicite;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return \DateTime
     */
    public function getDatepublication()
    {
        return $this->datepublication;
    }

    /**
     * @param \DateTime $datepublication
     */
    public function setDatepublication($datepublication)
    {
        $this->datepublication = $datepublication;
    }

    /**
     * @return \DateTime
     */
    public function getDateeffet()
    {
        return $this->dateeffet;
    }

    /**
     * @param \DateTime $dateeffet
     */
    public function setDateeffet($dateeffet)
    {
        $this->dateeffet = $dateeffet;
    }

    /**
     * @return \DateTime
     */
    public function getDateexpiration()
    {
        return $this->dateexpiration;
    }

    /**
     * @param \DateTime $dateexpiration
     */
    public function setDateexpiration($dateexpiration)
    {
        $this->dateexpiration = $dateexpiration;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param File $imageFile
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
        if ($image) {
            $this->datepublication = new \DateTime('now');
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @param string $imageName
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    /**
     * @return \Article
     */
    public function getArticle()
    {
        return $this->Article;
    }

    /**
     * @param \Article $Article
     */
    public function setArticle($Article)
    {
        $this->Article = $Article;
    }

    /**
     * @return \Publicite
     */
    public function getPublicite()
    {
        return $this->publicite;
    }

    /**
     * @param \Publicite $publicite
     */
    public function setPublicite($publicite)
    {
        $this->publicite = $publicite;
    }

}